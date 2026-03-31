<?php

namespace App\Http\Controllers;

use App\Events\PayEvent;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $user;
    public function __construct()
    {
        $this->user = Auth::user();
    }
    public function index()
    {

        if ($this->user->isClient()) {
            $bookings = $this->user->bookings()->orderBy('updated_at', 'asc')
                ->where('status', 'approved')
                ->get();
            return view('layouts.backend.bookings.index', compact('bookings'));
        } else {

            $bookings = Booking::whereNotIn('user_id', [$this->user->id])
                ->orderBy('updated_at', 'asc')
                ->get();
            return view('layouts.backend.bookings.index', compact('bookings'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * initiate payment for a booking
     */

    public function initiatePayment(Request $request,   Booking $booking)
    {
        // dd($request->all(), $booking);
        $name = $booking->user->name;
        $email = $booking->email;
        $amount = $request['depositAmount'] ? $request['depositAmount'] : $booking->total_amount * 100;
        $depositAmount = $booking->deposit_amount ? $booking->deposit_amount * 100 : $amount;
        // new PayEvent();
        event(new PayEvent($name, $email, $depositAmount));
        return response()->json(['message' => 'Payment initiated successfully']);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {

        return view('layouts.backend.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
