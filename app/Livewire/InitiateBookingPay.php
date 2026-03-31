<?php

namespace App\Livewire;

use App\Events\PayEvent;
use App\Models\Booking;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class InitiateBookingPay extends Component
{
    use WithSweetAlert;
    public $booking;
    public $amount;
    #[Validate('required|numeric')]
    public $bookingId;
    #[Validate('required|numeric')]
    public $customAmount;

    #[Validate('nullable|numeric|min:0')]
    public $depositAmount;

    public function mount()
    {
        $this->amount = (float) $this->booking->total_amount;
        $this->depositAmount =  $this->booking->deposit_amount ?? .5 * $this->booking->total_amount;
        $this->customAmount = 0;
    }
    #[On('refreshComponent')]
    public function render()
    {
        return view('livewire.initiate-booking-pay');
    }
    public function initiatePayment(INT $bookingId)
    {
        $booking = Booking::FindOrFail($bookingId);
        // event(new PayEvent($booking->user->name, $booking->email, $this->depositAmount));
        // $this->validate();
        $this->dispatch('initializePayment', [
            'id' => $booking->id,
            'key' => env('PAYSTACK_PUBLIC_KEY'),
            'name' => $booking->user->name,
            'email' => $booking->email,
            'amount' => $this->customAmount ? $this->customAmount * 100 : $this->booking->total_amount * 100
        ]);
    }
    public function updateBooking(Booking $booking)
    {
        $this->booking = $booking;
    }
    #[On('paymentSuccess')]
    public function paymentSuccessFull($reference, $bookingId, $amount)
    {
        $booking = Booking::whereId($bookingId)->first();

        if (!$booking) {
            $this->swalFire([
                'title' => 'Error',
                'text' => 'Booking not found',
                'icon' => 'error',
            ]);
            return;
        }

        $data = $this->verifyPaystackTransaction($reference);

        if ($data['data']['status'] === 'success') {
            $amount = $amount / 100; // Convert back to original amount

            // Handle successful payment
            if ($amount < $booking->total_amount) {
                $newDepositPaid = $booking->deposit_paid + $amount;

                if ($newDepositPaid <= $booking->total_amount) {
                    $booking->update([
                        'deposit_paid' => $newDepositPaid,
                        'payment_status' => $newDepositPaid === $booking->total_amount ? 'paid' : 'partially_paid',
                    ]);
                }
            } else {
                $booking->update([
                    'deposit_paid' => $booking->total_amount,
                    'payment_status' => 'paid',
                ]);
            }

            $this->swalFire([
                'title' => 'Payment Successful',
                'text' => 'Payment completed for ' . $booking->user->name,
                'icon' => 'success',
            ]);
            $this->dispatch('refreshComponent');
        } else {
            $this->swalFire([
                'title' => 'Payment Failed',
                'text' => 'Payment failed for ' . $booking->user->name,
                'icon' => 'error',
            ]);
        }
    }
    public function verifyPaystackTransaction($reference)
    {
        $secretKey = env('PAYSTACK_SECRET_KEY');
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $secretKey,
        ])->get('https://api.paystack.co/transaction/verify/' . $reference)->json();
    }
}
