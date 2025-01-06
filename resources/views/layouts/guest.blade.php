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
            background-image: url('/background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Figtree', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
    
        .form-container {
            width: 500px;
            background: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    
        h1 {
            font-size: 40px;
            color: #388ec0;
            text-align: center;
            margin-bottom: 20px;
        }
    
        input {
            width: 100%;
            padding: 12px;
            margin-top: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }
    
        .btn-login {
            width: 100%;
            padding: 12px;
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
    
        .text-center {
            text-align: center;
        }
    
        .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    
        .remember-me {
            font-size: 14px;
        }
    
        .underline {
            text-decoration: underline;
        }
    
        .forgot-password-link {
            text-align: center;
            margin-top: 20px;
        }
    
        .form-container input:not(:last-child) {
            margin-bottom: 15px;
        }
    
        .forgot-password-link a {
            color: #388ec0;
            text-decoration: none;
        }
    
        .forgot-password-link a:hover {
            color: #2c6b99;
        }
    </style>
    
</head>
<body>
    <div class="form-container">
        {{ $slot }}
    </div>
</body>
</html>
