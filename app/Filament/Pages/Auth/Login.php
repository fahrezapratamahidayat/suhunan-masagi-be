<?php

namespace App\Filament\Pages\Auth;

use Filament\Schemas\Schema;
use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class Login extends BaseLogin
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
            ])
            ->statePath('data');
    }

    protected function throwFailureValidationException(): never
    {
        $data = $this->form->getState();
        $email = $data['email'] ?? null;
        
        $user = \App\Models\User::where('email', $email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'data.email' => 'Email tidak terdaftar. Silakan periksa kembali email Anda.',
            ]);
        }

        throw ValidationException::withMessages([
            'data.password' => 'Password yang Anda masukkan salah. Silakan coba lagi.',
        ]);
    }
}
