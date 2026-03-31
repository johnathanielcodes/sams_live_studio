<?php

namespace App\Livewire;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class RequestUserToPay extends Component
{
    use WithSweetAlert;
    public $payment;
    public function render()
    {
        return view('livewire.request-user-to-pay');
    }
    public function initiateTransaction()
    {
        $this->dispatch('initializePayment', [
            "name" => $this->payment->user->name,
            "email" => $this->payment->user->email,
            "amount" => ($this->payment->amount) * 100,
        ]);
    }
    public function paymentFailed()
    {
        dd('failed');
    }
    public function paymentSuccessful($data)
    {

        $reference = $data['reference'];
        $response = $this->verifyPaystackTransaction($reference);

        $this->payment->update([
            'status' => 'paid'
        ]);
        $this->swalFire([
            'icon' => 'success',
            'title' => 'Success',
            'text' => "Thanks " . Auth::user()->name . ". Your " . $this->payment->type()->first()->name . " was Successful!",
        ]);
    }
    public function verifyPaystackTransaction(string $reference)
    {
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->get("https://api.paystack.co/transaction/verify/{$reference}");

        if ($response->failed()) {
            return false;
        }

        $payload = $response->json();

        // Paystack API-level success
        if (!($payload['status'] ?? false)) {
            return false;
        }

        // Transaction-level success
        if (($payload['data']['status'] ?? '') !== 'success') {
            return false;
        }
        return $payload;
        // return $payload['data']['receipt_number'] ?? $reference; // Use receipt number or fallback to reference
    }
    public function verifyPayment(string $reference)
    {
        $response = $this->verifyPaystackTransaction($reference);
        // dd($response);
        if ($response['data']['status'] = 'success' && $response !== false) {

            $this->swalFire([
                'icon' => 'success',
                'title' => 'Success',
                'html' => "<p>Payment was Successful!</p><p>Receipt Number: " . ($response['data']['receipt_number'] ?? $reference) . "</p><p>Amount Paid: Kes. " . number_format(($response['data']['amount'] / 100), 2) . "</p>" . "<p>Email: " . $response['data']['customer']['email'] . "</p>",
            ]);
        } else {
            $this->swalFire([
                'icon' => 'error',
                'title' => 'Verification Failed',
                'text' => "Sorry .We couldn't verify your payment. Please try again.",
            ]);
        }
    }
}
