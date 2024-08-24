<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
     <!-- Session Status -->
     <x-auth-session-status class="mb-4" :status="session('status')" />
        
    <form method="POST" action="{{ route('login') }}">
     @csrf
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Halaman_Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
       
    </head>
    <body>
        <x-guest-layout>
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
        
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-between mt-4">
                    <!-- Remember Me -->
                    <div class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <label for="remember_me" class="ms-2 text-sm text-gray-600">{{ __('Simpan Kata Sandi?') }}</label>
                    </div>
                
                    <!-- Forgot Password Link -->
                    @if (Route::has('password.request'))
                    <div class="flex items-center">
                        <a class="underline text-xs text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Lupa Kata Sandi?') }}
                        </a>
                    </div>
                    @endif
                </div>
                

                    <!-- Log In Button -->
                    <div class="flex justify-center mt-5">
                        <div class="max-w-xs w-full text-center px-2 py-2 bg-blue-800 border border-transparent rounded-2xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <x-primary-button>
                                {{ __('Masuk') }}
                            </x-primary-button>
                        </div>
                    </div>
                    
                    

                    {{-- Registrasi --}}
                    @if (Route::has('register'))
                    <a
                    href="{{ route('register') }}"
                    class="flex justify-center mt-4 px-4 py-2 text-xs text-black uppercase tracking-widest hover:text-blue-600"
                            >
                                Daftar Akun Baru
                            </a>
                            
                    @endif
            </form>
        </x-guest-layout>
        
    </body>

</html>
