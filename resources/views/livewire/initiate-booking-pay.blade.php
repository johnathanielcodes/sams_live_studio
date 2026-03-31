<div>
    <button class="btn btn-primary mb-2" href="#" role="button" data-bs-toggle="modal"
        data-bs-target="#initiateBookingPay_{{ $booking->id }}">Pay</button>

    <!-- Modal Body-->
    <div class="modal fade" id="initiateBookingPay_{{ $booking->id }}" tabindex="-1" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Pay for Booking #{{ $booking->id }} - {{ $booking->service_type_label }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <p>Amount to Pay: {{ $amount - $booking->deposit_paid }}</p>
                                <x-input-label for="amount_{{ $booking->id }}" class="mb-2" :value="__('Deposit Amount')" />
                                <x-text-input id="amount_{{ $booking->id }}" wire:model="customAmount"
                                    class="block mt-1 w-full mb-2" type="number" step="0.01" />
                                @error('customAmount')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                {{-- --}}
                                <button id="initiatePaymentBtn_{{ $booking->id }}"
                                    wire:click="initiatePayment({{ $booking->id }})" data-bs-dismiss="modal"
                                    class="btn btn-success">Initiate
                                    Payment</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <p>
                        Note: The payment process will be initiated based on the amount specified. If you have entered a
                        custom amount, that will be used instead of the default amount.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

