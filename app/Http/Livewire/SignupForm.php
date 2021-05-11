<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class SignupForm extends Component
{
    public $first_name,$last_name,$phone_number,$twitter,$facebook,$google_plus;
    public $user_name,$password,$zip_code,$full_name;

    public function __construct(){
        if(!empty($first_name)){
            $randstr=Str::random(10);
            $this->user_name=$first_name."".$randstr;
        }
    }
    public function render()
    {
        return view('livewire.signup-form');
    }

    protected $rules = [
        'first_name' => 'required|min:3',
        'phone_number' => 'required|min:3',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit(){

    }



}
