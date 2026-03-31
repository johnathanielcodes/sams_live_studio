@props(['bookings'])
<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                @hasrole('admin')
                <th>Client</th>
                @endhasrole
                <th>Session</th>
                <th>Start</th>
                <th>Ending</th>
                <th>Amount Paid</th>
                <th>Amount Due</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    @hasrole('admin')
                    <td>{{ $booking->user->name }}</td>
                    @endhasrole
                    <td>{{ Str::ucfirst(str_replace('_', ' ', $booking->service_type)) }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->session_start)->toFormattedDateString() . ' ' . \Carbon\Carbon::parse($booking->session_start)->format('h:i:a') }}
                    </td>
                    <td>{{ \Carbon\Carbon::parse($booking->session_end)->toFormattedDateString() . ' ' . \Carbon\Carbon::parse($booking->session_end)->format('h:i:a') }}
                    </td>
                    <td>Kes {{ number_format($booking->deposit_paid, 2) }}</td>
                    <td>Kes {{ number_format($booking->total_amount - $booking->deposit_paid, 2) }}</td>
                    <td>
                        @php
                            $start = \Carbon\Carbon::parse($booking->session_start);
                            $end = \Carbon\Carbon::parse($booking->session_end);
                            $daysDiff = round($start->diffInHours($end));
                        @endphp

                        {{ $daysDiff }} Hrs
                    </td>
                    <td>{{ $booking->status }}</td>
                    <td>
                        <div>
                            @if (Auth::user()->isAdmin())
                                <a href="{{ route('bookings.show', $booking->id) }}" class="btn mb-2 btn-success">
                                    <i class="fa fa-eye"></i> View
                                </a>
                                <div x-data="{ open{{ $booking->id }}: false }">
                                    <button wire:click="setSelectedBooking({{ $booking }})" type="button"
                                        @click="open{{ $booking->id }} = !open{{ $booking->id }}"
                                        class="btn mb-2 btn-primary">
                                        <i class="fa fa-pencil"></i> Time
                                    </button>

                                    <form x-show="open{{ $booking->id }}" x-cloak
                                        wire:submit.prevent="saveBookingTime({{ $booking }})">

                                        <div class="mb-3">
                                            <label for="start_{{ $booking->id }}" class="form-label">Start at</label>
                                            <input type="time" id="start_{{ $booking->id }}" wire:model="start"
                                                class="form-control @error('start') is-invalid @enderror" />
                                            @error('start')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="end_{{ $booking->id }}" class="form-label">End at</label>
                                            <input type="time" id="end_{{ $booking->id }}" wire:model="end"
                                                class="form-control @error('end') is-invalid @enderror" />
                                            @error('end')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-save"></i> Save
                                            </button>
                                            <button type="button" @click="open{{ $booking->id }} = false"
                                                class="btn btn-secondary">
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <style>
                                    [x-cloak] {
                                        display: none;
                                    }
                                </style>
                                <button type="button" class="btn mb-2 btn-info"
                                    wire:click="updateBooking('approved',{{ $booking }})">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i> Approve
                                </button>
                                <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#cancelBookingModal_{{ $booking->id }}"
                                    class="btn mb-2 btn-danger">
                                    <i class="fa fa-x" aria-hidden="true"></i> Cancel
                                </button>

                                <div class="modal fade" id="cancelBookingModal_{{ $booking->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h3 class="text-center mb-4">Are you sure you want to cancel this
                                                    booking?
                                                </h3>

                                                <button type="button"
                                                    wire:click="updateBooking('cancelled',{{ $booking->id }})"
                                                    data-bs-dismiss="modal" class="btn btn-danger">Yes</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">
                                                    No
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if ($booking->deposit_paid !== $booking->total_amount && $booking->status === 'approved')
                                    <livewire:initiate-booking-pay :booking="$booking" />
                                @endif
                                <a href="{{ route('bookings.show', $booking->id) }}" class="btn mb-2 btn-success">
                                    <i class="fa fa-eye"></i> View
                                </a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
