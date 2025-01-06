<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('/background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .form-container {
            width: 600px;
            max-width: 90%;
            background: rgba(255, 255, 255, 0.85);
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 40px;
            color: #388ec0;
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background-color: #388ec0;
            color: #fff;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .btn-login:hover {
            background-color: #2c6b99;
        }

        .extra-options {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 14px;
            color: #388ec0;
        }

        .remember-me-container {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #388ec0;
        }

        .register-link {
            color: #388ec0;
            font-size: 14px;
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            font-weight: bold;
            color: #388ec0;
            text-decoration: none;
        }

        .register-link a:hover {
            color: #2c6b99;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('/background.jpg');">
        <div class="form-container sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
            <h1>Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="extra-options">
                    <div class="remember-me-container">
                        <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                        <label for="remember_me">{{ __('Remember me') }}</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-gray-900">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="btn-login">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            @if (Route::has('register'))
                <div class="register-link">
                    Don't have an account? <a href="{{ route('register') }}">Register here</a>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
