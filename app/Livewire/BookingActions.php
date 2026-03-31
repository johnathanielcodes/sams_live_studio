<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class BookingActions extends Component
{
    use WithSweetAlert;
    public $booking;
    #[Validate('required')]
    public $start;
    #[Validate('required')]
    public $end;
    public function mount()
    {
        $this->start = Carbon::parse($this->booking->session_start)->format("H:i");
        $this->end = Carbon::parse($this->booking->session_end)->format("H:i");
    }
    public function render()
    {

        return view('livewire.booking-actions');
    }
    public function updateBooking(string $status)
    {
        $this->booking->status = $status;
        $this->booking->update();
        $this->swalToast([
            'icon' => 'success',
            'position' => 'top-end',
            'title' => "Success",
            'text' => "Booking has been '{$this->booking->status}'",
            'showConfirmButton' => false,
            'timer' => 3000,
            'timerProgressBar' => true
        ]);
        $this->dispatch('bookingUpdated');
    }
    public function saveBookingTime()
    {
        $this->validate();
        $initialBookingStart = $this->booking->session_start;
        $initialBookingEnd = $this->booking->session_end;
        $newStartTime = Carbon::parse($initialBookingStart)->setTime(Carbon::parse($this->start)->format("H"), Carbon::parse($this->start)->format("i"));
        $newEndTime = Carbon::parse($initialBookingEnd)->setTime(Carbon::parse($this->end)->format("H"), Carbon::parse($this->end)->format("i"));
        $this->booking->session_start = $newStartTime;
        $this->booking->session_end = $newEndTime;
        $this->booking->update();
        $this->dispatch('bookingUpdated');
    }
}
