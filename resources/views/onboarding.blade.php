<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Onboarding</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
        @endif
    </head>
    <body class="bg-gradient-to-r from-[#1C2256] via-[#166AC0] to-[#183676] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
      <div class="container">
        <div class="card w-full flex justify-center items-center">
           <a href="{{ route('get-started') }}">
            <button class="btn bg-white py-2 px-4">Get Started</button>
          </a>
          
        </div>
      </div>
    </body>
</html>
