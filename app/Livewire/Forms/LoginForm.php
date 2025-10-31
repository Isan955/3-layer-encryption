<?php

namespace App\Livewire\Forms;

use App\Helpers\CipherHelper;
use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    #[Validate('boolean')]
    public bool $remember = false;

    /**
     * Custom authentication (tanpa bcrypt, pakai 3 metode enkripsi + PIN user).
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $user = User::where('email', $this->email)->first();

        if (! $user) {
            throw ValidationException::withMessages([
                'form.email' => 'Email tidak ditemukan.',
            ]);
        }

        //  PIN punya user dari db
        $pin = $user->pin;

        $decryptedPassword = CipherHelper::tripleDecrypt($user->password_encrypted, $pin);

        if ($decryptedPassword !== $this->password) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'form.password' => 'Password salah!',
            ]);
        }

        // login manual tanpa bcrypt
        Auth::login($user, $this->remember);

        RateLimiter::clear($this->throttleKey());
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'form.email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}
