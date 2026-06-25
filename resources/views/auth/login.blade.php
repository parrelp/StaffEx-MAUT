{{-- <!DOCTYPE html>
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
        <div class="card">
           <h1>Login</h1>
            <form method="POST" action="{{ route('login.process') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit">Login</button>
            </form>
          
        </div>
      </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./output.css" rel="stylesheet" />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
        @vite(['resources/css/style.css'])
        @vite(['resources/js/script.js'])


    
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
        @endif

  </head>

  <body class="flex font-poppins items-center justify-center bg-gradient-to-r from-[#1C2256] via-[#166AC0] to-[#183676]">

    @if(session('success'))
        <div id="alert-message" class="alert-success bg-gradient-to-b from-[#05062D] via-[#101493] to-[#262CEA] border-l-8 border-[#50FFF6] rounded-lg text-teal-900 px-4 py-3 shadow-md outline-2 outline-white/35" role="alert">
            <div class="flex items-center gap-2">
            <div class="py-1">
                <i class="ti ti-progress-check text-6xl text-[#50FFF6]"></i>
            </div>
            <div>
                <p class="alert-title text-lg font-bold text-[#50FFF6]">Success!</p>
                <p class="alert-message text-lg text-white">{{ session('success') }}</p>
            </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div id="alert-message" class="alert-error bg-gradient-to-b from-[#05062D] via-[#101493] to-[#262CEA] border-l-8 border-[#FF3E9A] rounded-lg text-teal-900 px-4 py-3 shadow-md outline-2 outline-white/35" role="alert">
            <div class="flex items-center gap-2">
            <div class="py-1">
                <i class="ti ti-alert-triangle text-6xl text-[#FF3E9A]"></i>
            </div>
            <div>
                <p class="alert-title text-lg font-bold text-[#FF3E9A]">Failed!</p>
                <p class="alert-message text-lg text-white">{{ session('error') }}</p>
            </div>
            </div>
        </div>
    @endif

    <div class="h-screen w-screen flex justify-center items-center dark:bg-gray-900">
    <div class="grid gap-8">
      <div
        id="back-div"
        class="bg-gradient-to-r from-blue-500 to-purple-500 rounded-[26px] m-4"
      >
        <div
          class="border-[20px] border-transparent rounded-[20px] dark:bg-gray-900 bg-white shadow-lg xl:p-10 2xl:p-10 lg:p-10 md:p-10 sm:p-2 m-2"
        >
          <h1 class="pt-8 pb-6 font-bold dark:text-gray-400 text-5xl text-center cursor-default">
            Sign In
          </h1>
          <form action="{{ route('login.process') }}" method="POST" class="space-y-4">
          @csrf
            <div>
              <label for="email" class="mb-2  dark:text-gray-400 text-lg">Email</label>
              <input
                id="email"
                class="border p-3 dark:bg-indigo-700 dark:text-gray-300  dark:border-gray-700 shadow-md placeholder:text-base focus:scale-105 ease-in-out duration-300 border-gray-300 rounded-lg w-full"
                type="email"
                name="email"
                placeholder="Email"
                required
              />
            </div>
            <div>
              <label for="password" class="mb-2 dark:text-gray-400 text-lg">Password</label>
              <input
                id="password"
                class="border p-3 shadow-md dark:bg-indigo-700 dark:text-gray-300  dark:border-gray-700 placeholder:text-base focus:scale-105 ease-in-out duration-300 border-gray-300 rounded-lg w-full"
                type="password"
                name="password"
                placeholder="Password"
                required
              />
            </div>
            <a
              class="group text-blue-400 transition-all duration-100 ease-in-out"
              href="#"
            >
              <span
                class="bg-left-bottom bg-gradient-to-r text-sm from-blue-400 to-blue-400 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-500 ease-out"
              >
                Forget your password?
              </span>
            </a>
            <button
              class="bg-gradient-to-r dark:text-gray-300 from-blue-500 to-purple-500 shadow-lg mt-6 p-2 text-white rounded-lg w-full hover:scale-100 hover:from-purple-500 hover:to-blue-500 transition duration-300 ease-in-out font-semibold cursor-pointer"
              type="submit"
            >
              SIGN IN
            </button>
          </form>
          {{-- <div class="flex flex-col mt-4 items-center justify-center text-sm">
            <h3 class="dark:text-gray-300">
              Don't have an account?
              <a
                class="group text-blue-400 transition-all duration-100 ease-in-out"
                href="#"
              >
                <span
                  class="bg-left-bottom bg-gradient-to-r from-blue-400 to-blue-400 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-500 ease-out"
                >
                  Sign Up
                </span>
              </a>
            </h3>
          </div> --}}
          <!-- Third Party Authentication Options -->

        </div>
      </div>
      </div>
    </div>
  </body>
</html>
