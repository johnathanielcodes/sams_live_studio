<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class MakeDonation extends Component
{
    use WithSweetAlert;
    #[Validate('required')]
    public $amount;
    public function render()
    {
        return view('livewire.make-donation');
    }

    public function makeDonation()
    {
        $data =   $this->validate();
        $this->swalFire([
            'title' => 'making payment'
        ]);
    }
}
