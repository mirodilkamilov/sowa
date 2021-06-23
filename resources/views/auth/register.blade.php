<x-guest-layout>
    <x-laravel.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-laravel.application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-laravel.auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-laravel.label for="name" :value="__('Name')" />

                <x-laravel.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-laravel.label for="email" :value="__('Email')" />

                <x-laravel.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-laravel.label for="password" :value="__('Password')" />

                <x-laravel.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-laravel.label for="password_confirmation" :value="__('Confirm Password')" />

                <x-laravel.input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-laravel.button class="ml-4">
                    {{ __('Register') }}
                </x-laravel.button>
            </div>
        </form>
    </x-laravel.auth-card>
</x-guest-layout>
