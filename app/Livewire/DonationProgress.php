<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Attributes\On;
use Livewire\Component;

class DonationProgress extends Component
{
    public $inAccount;
    public $progress;
    public $goal;
    public function mount()
    {
        $this->loadComponent();
    }
    #[On('donationMade')]
    public function render()
    {
        return view('livewire.donation-progress');
    }
    #[On('donationMade')]
    public function loadComponent()
    {
        $this->inAccount = Payment::where('payment_type', 1)->where('status', 'paid')->sum('amount');
        $this->goal = env("GOAL");
        $this->progress = ($this->inAccount / $this->goal) * 100;
    }
}
