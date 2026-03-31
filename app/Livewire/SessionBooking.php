<?php

namespace App\Livewire;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class SessionBooking extends Component
{
    public $bookings;
    public $user;
    public function mount()
    {
        $this->loadEvents();
        $this->user = Auth::user();
    }

    public function loadEvents()
    {

        $this->bookings = Booking::select(
            'id',
            'user_id',
            'name',
            'email',
            'phone',
            'service_type as title',
            'session_start',
            'session_end',
            'duration',
            'participants',
            'project_details',
            'status',
            'total_amount',
            'deposit_paid',
            'created_at',
            'updated_at'
        )
            ->selectRaw("CONCAT(session_start) as start")
            ->selectRaw("DATE_ADD(CONCAT(session_start), INTERVAL duration HOUR) as end")
            ->whereIn('status', ['pending', 'approved'])
            ->get()
            ->map(function ($booking) {
                return [
                    'id' => $booking->id,
                    'user_id' => $booking->user_id,
                    'title' => ucfirst(str_replace('_', ' ', $booking->title)),
                    'start' => $booking->start,
                    'end' => $booking->end,
                    'name' => $booking->name,
                    'email' => $booking->email,
                    'phone' => $booking->phone,
                    'session_start' => $booking->session_start,
                    'session_end' => $booking->session_end,
                    'duration' => $booking->duration,
                    'participants' => $booking->participants,
                    'project_details' => $booking->project_details,
                    'status' => $booking->status,
                    'total_amount' => $booking->total_amount,
                    'deposit_paid' => $booking->deposit_paid,
                    'created_at' => $booking->created_at,
                    'updated_at' => $booking->updated_at,
                ];
            })
            ->toArray();
    }

    #[On('addBooking')]
    public function addBooking(

        $session_type,
        $duration,
        $participants,
        $project_details,
        $start,
        $end,
    ) {
        if (date('Y-m-d', strtotime($start)) < now()) {
            $this->dispatch("bookingPrevDays", events: $this->bookings);
        } else {
            // Check if slot is already booked
            $existingBooking = Booking::where('session_start', date('Y-m-d', strtotime($start)))
                ->where('session_end', date('H:i:s', strtotime($start)))
                ->whereIn('status', ['pending', 'approved'])
                ->first();

            if ($existingBooking && date('Y-m-d', strtotime($start)) >= now()) {
                $this->dispatch('booking-error', message: 'This time slot is already booked. Please choose another time.');
                return;
            }
            $chargePerHour = 500;

            $total_amount = $duration * $chargePerHour;
            // $deposit_amount
            // Create booking
            $booking = Booking::create([
                'user_id' => Auth::id(),
                'name' => $this->user->name,
                'email' => $this->user->email,
                'phone' => $this->user->phone,
                'service_type' => $session_type,
                'session_start' => Carbon::parse($start),
                'session_end' =>  Carbon::parse($end),
                'duration' => (int)$duration,
                'participants' => (int)$participants,
                'project_details' => $project_details ?? null,
                'status' => 'pending',
                'total_amount' => (float)$total_amount,
                'deposit_paid' => $deposit_amount ?? 0
            ]);
            $this->loadEvents();
            $this->dispatch('eventCreated');
            $this->dispatch('eventsLoaded', events: $this->bookings);
            return $booking;
        }
    }

    public function render()
    {
        return view('livewire.session-booking');
    }
}
