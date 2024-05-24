<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components\layouts\authentication')]
#[Title('Dashbord Login')]

class AdminLogin extends Component
{
    public $email;
    public $password;
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];


    public function login()
    {
        $this->validate();

        // dashbord login logic here
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password],$this->remember))
         {
            return redirect()->route('dashboard');
        }else{
            $this->reset(['email','password','remember']);
            // Trigger a success notification
            return $this->dispatch('toast', message: 'The email or password you entered is incorrect. Please try again!', notify:'error' );
        }
    }

    public function render()
    {
        return view('livewire.backend.admin-login');
    }
}
