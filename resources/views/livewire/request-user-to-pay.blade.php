@props(['payment'])
<div>
    @if ($payment->status === 'unpaid')
        <button wire:click="initiateTransaction" class="btn bg-[#FF8F20] hover:bg-[#FF8F20] text-white"> <i
                class="fa fa-dollar animate-pulse" aria-hidden="true"></i>
            Request Payment</button>
        <button class="btn btn-outline-secondary"> <i class="fa fa-recycle animate-pulse" aria-hidden="true"></i>
            Remind</button>
    @else
        <button class="btn btn-success" wire:click="verifyPayment('{{ $payment->reference }}')"> <i
                class="fa fa-question animate-pulse" aria-hidden="true"></i>
            verify</button>
    @endif
</div>
@script
    <script>
        $wire.on('initializePayment', async (event) => {
            if (event) {
                const data = event[0];
                // Dynamically load Paystack script if not loaded
                if (!window.PaystackPop) {
                    await new Promise((resolve, reject) => {
                        const script = document.createElement('script');
                        script.src = 'https://js.paystack.co/v1/inline.js';
                        script.onload = resolve;
                        script.onerror = reject;
                        document.body.appendChild(script);
                    });
                }

                // Initialize Paystack
                let handler = PaystackPop.setup({
                    key: '{{ env('PAYSTACK_PUBLIC_KEY') }}', // Corrected
                    email: data.email,
                    amount: data.amount,
                    currency: 'KES',
                    ref: 'PS_' + Math.floor(Math.random() * 1000000000 + 1),
                    callback: function(response) {
                        // Notify Livewire of success
                        $wire.paymentSuccessful(response);
                    },
                    onClose: function(response) {
                        $wire.paymentFailed();
                    }
                });

                handler.openIframe();
            }
        });
    </script>
@endscript
