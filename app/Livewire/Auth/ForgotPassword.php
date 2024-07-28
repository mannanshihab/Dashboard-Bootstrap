<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Forgot Password')]
class ForgotPassword extends Component
{
    public $email;

    public function save(){
        $this->validate([
            'email' => 'required|email|exists:users,email| max:255',
        ]);

        $status = Password::sendResetLink(['email' => $this->email]);
        
        if($status === Password::RESET_LINK_SENT){
            $this->dispatch('swal', [
                'title' => 'Password reset link send to your email address !.',
                'icon' => 'success',
            ]);
            $this->email = '';
        }
    }
    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
