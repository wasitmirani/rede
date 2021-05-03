<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SignupForm extends Component
{
    public $first_name,$last_name,$phone_number,$twitter,$facebook,$google_plus;
    public $user_name,$password,$zip_code;

    public function render()
    {
        return view('livewire.signup-form');
    }

    protected $rules = [
        'first_name' => 'required|min:3',
        'phone_number' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
