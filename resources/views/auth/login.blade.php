<x-guest-layout>

    {{-- <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900"> --}}

        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">

            <!-- Logo / Title -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                    🏪 Minimarket Login
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Masuk ke sistem manajemen
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-center text-green-500" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300"/>
                    <x-text-input id="email"
                        class="block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300"/>
                    <x-text-input id="password"
                        class="block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500"
                        type="password"
                        name="password"
                        required />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-500" />
                </div>

                <!-- Remember + Forgot -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                        <input type="checkbox" name="remember"
                            class="rounded border-gray-300 dark:bg-gray-900">
                        {{ __('Remember me') }}
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-blue-500 hover:underline">
                            {{ __('Forgot?') }}
                        </a>
                    @endif
                </div>

                <!-- Button -->
                <x-primary-button class="w-full justify-center py-2 text-base bg-blue-600 hover:bg-blue-700">
                    {{ __('Log in') }}
                </x-primary-button>

            </form>

        </div>

    {{-- </div> --}}

</x-guest-layout>