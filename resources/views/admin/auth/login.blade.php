<title>Admin Login Page</title>

<x-guest-layout>
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-700 dark:text-gray-300">{{ __('Admin Login Form') }}</h2>

    <x-auth-session-status class="mt-4 mb-4" :status="session('status')" />
    <x-auth-session-status class="mt-4 text-red-600 dark:text-red-400 mb-4 alert-danger" :status="session('error')" />

    <form method="POST" action="{{ route('admin_login_process') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
