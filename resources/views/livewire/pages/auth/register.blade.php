<?php

use App\Models\User;
use App\Helpers\CipherHelper;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $pin = ''; 

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'pin' => ['required', 'digits_between:6,12'],
        ]);
        

        $key = $validated['pin']; 
        $plainPassword = $validated['password'];

        $encryptedName = CipherHelper::tripleEncrypt($validated['name'], $key);
        $encryptedPassword = CipherHelper::tripleEncrypt($plainPassword, $key);

        // $encodedName = base64_encode($encryptedName);
        // $encodedPassword = base64_encode($encryptedPassword);

        $user = User::create([
            'name' => $validated['name'], 
            'email' => $validated['email'],
            'password' => $plainPassword, 
            'pin' => $validated['pin'],
            'role' => 'user',
            'username_encrypted' => $encryptedName,
            'password_encrypted' => $encryptedPassword,
        ]);

        event(new Registered($user));
        Auth::login($user);

        $this->redirect(route('home', absolute: false), navigate: true);
    }
};

?>


<div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Register Account</h2>

    <form wire:submit="register">
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" type="text" name="name" class="block mt-1 w-full" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" type="email" name="email" class="block mt-1 w-full" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" type="password" name="password" class="block mt-1 w-full" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" type="password" name="password_confirmation" class="block mt-1 w-full" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="pin" :value="__('PIN (min 6 digit)')" />
            <x-text-input wire:model="pin" id="pin" type="text" name="pin" maxlength="8" class="block mt-1 w-full" required />
            <x-input-error :messages="$errors->get('pin')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-gray-600 hover:text-gray-900 underline" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
