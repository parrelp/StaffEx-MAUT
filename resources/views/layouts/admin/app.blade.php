<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://unpkg.com/@tabler/icons@latest/iconfont/tabler-icons.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/style.css'])
    @vite(['resources/js/script.js'])
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <script src="https://cdn.jsdelivr.net/gh/creativetimofficial/david-ai@1.0.6/packages/dist/david-ai.min.js" defer></script>

    <style>
        body {
            margin: 0;
            font-family: "Montserrat", sans-serif;
            display: flex;
            background: linear-gradient(to right, #1C2256, #166AC0, #183676);
        }

                /* add the code bellow */ 
      @layer utilities {
            /* Hide scrollbar for Chrome, Safari and Opera */
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }
          /* Hide scrollbar for IE, Edge and Firefox */
            .no-scrollbar {
                -ms-overflow-style: none;  /* IE and Edge */
                scrollbar-width: none;  /* Firefox */
          }
        }

        .divider-eval {
          position: relative;
          width: 100%;
          height: 2px; /* agar tinggi elemen sesuai garis */
          background: transparent; /* transparan agar tidak ganggu background lain */
        }

        .divider-eval::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(
                90deg,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 1) 50%,
                rgba(255, 255, 255, 0) 100%
            );
        }

        .card-info {
          background: #FFFFFF;
          background: linear-gradient(180deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%);
          box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }

        .card-summary {
          background: #FFFFFF;
          background: linear-gradient(180deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%);
          box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }

        /* .choice {
          background: #FFFFFF;
          background: linear-gradient(180deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%);
        } */

        .selected {
          background: #1B2A62;
          background: linear-gradient(180deg, rgba(27, 42, 98, 1) 0%, rgba(24, 115, 204, 1) 100%);
          filter: drop-shadow(0 0 10px rgba(255, 255, 255, 1));
          outline: 6px solid #FFFFFF;
        }



        .sidebar {
            position: fixed; /* Posisi tetap di layar */
            top: 50%; /* Pusatkan secara vertikal */
            left: 0;
            transform: translateY(-50%); /* Pusatkan ke tengah layar */
            width: 103px;
            height: 95vh; /* Tinggi 90% layar */
            background: linear-gradient(180deg, rgba(255,255,255,0.19) 0%, rgba(255,255,255,0.06) 100%);
            border: 1px solid #FFFFFF;
            backdrop-filter: blur(10px);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 0;
            border-radius: 10px; /* Tambahan untuk efek rounded */
        }

        .sidebar img.logo {
            width: 60px;
            margin-bottom: 10px;
        }

        .divider {
            position: relative;
            width: 100%;
            margin: 10px 0;
            height: 2px; /* agar tinggi elemen sesuai garis */
            background: transparent; /* transparan agar tidak ganggu background lain */
        }

        .divider::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(
                90deg,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 1) 50%,
                rgba(255, 255, 255, 0) 100%
            );
        }


        .menu-icon {
            color: white;
            opacity: 50%;
            font-size: 43px
            margin: 15px 0;
            cursor: pointer;
        }

        .content {
            flex-grow: 1;
            margin-left: 103px; /* Memberi ruang untuk sidebar */
            padding: 20px;
            color: white;
            width: 100%;
        }

        .tooltip-container {
            position: relative;
            display: inline-block;
        }

        .tooltip {
            position: absolute;
            bottom: 100%;
            left: 200%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.068);
            color: #fff;
            padding: 15px 20px;
            border-radius: 12px;
            border: 2px solid rgb(255, 255, 255);
            backdrop-filter: blur(12px);
            font-size: 14px;
            text-align: center;
            box-shadow:
                0 8px 20px rgba(0, 0, 0, 0.4),
                inset 0 0 10px rgba(255, 255, 255, 0.212);
            white-space: nowrap;
            visibility: hidden;
            opacity: 0;
            transition:
                opacity 0.4s ease,
                transform 0.4s ease;
            }

            .tooltip::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 10%;
                transform: translateX(-50%);
                border-width: 8px;
                border-style: solid;
                border-color: rgba(255, 255, 255, 0.3) transparent transparent transparent;
                filter: drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.3));
            }

            .tooltip-container:hover .tooltip {
                visibility: visible;
                opacity: 1;
                transform: translateX(-50%) translateY(-15px);
            }

            .tooltip-container:hover .tooltip::after {
            border-color: rgba(255, 255, 255, 0.6) transparent transparent transparent;
            }

            .tooltip-trigger {
            padding: 15px 30px;
            color: #fff;
            font-size: 16px;
            text-transform: uppercase;
            cursor: pointer;
            transition:
                background 0.3s ease,
                transform 0.3s ease;
            }

            .menu-icon,
            .menu svg {
                color: white;
                opacity: 50%;
                transition: all 0.3s ease;
            }

            .menu-icon:hover,
            .menu svg:hover {
                opacity: 1;
                filter: drop-shadow(0 0 8px rgba(255, 255, 255, 0.9));
            }

            /* Kelas ini akan digunakan untuk item yang sedang aktif */
            .menu-icon.active,
            .menu svg.active {
                opacity: 1;
                filter: drop-shadow(0 0 10px rgba(255, 255, 255, 1));
            }

            .generate-rank-btn:hover {
                filter: drop-shadow(0 0 10px rgba(255, 255, 255, 1));
            }

    </style>
</head>
<body>

    <div class="sidebar ms-16 grid">
        <div class="logo flex justify-center items-center py-4">
            <img src="{{ asset('storage/images/himatik.png')}}" alt="Logo" class="logo">
        </div>

        <div class="divider"></div>

        <div class="user-profile flex justify-center items-center py-4">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="43"  height="43"  viewBox="0 0 24 24"  fill="none"  stroke="white"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-edge "><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.978 11.372a9 9 0 1 0 -1.593 5.773" /><path d="M20.978 11.372c.21 2.993 -5.034 2.413 -6.913 1.486c1.392 -1.6 .402 -4.038 -2.274 -3.851c-1.745 .122 -2.927 1.157 -2.784 3.202c.28 3.99 4.444 6.205 10.36 4.79" /><path d="M3.022 12.628c-.283 -4.043 8.717 -7.228 11.248 -2.688" /><path d="M12.628 20.978c-2.993 .21 -5.162 -4.725 -3.567 -9.748" /></svg>
        </div>

        <div class="divider"></div>

        <div class="menu flex flex-col items-center justify-start gap-4 py-16">
            
            <p class="text-white ">MENU</p>
            
            <div class="tooltip-container">
                <a href="{{ route('admin.dashboard') }}"><svg  xmlns="http://www.w3.org/2000/svg"  width="43"  height="43"  viewBox="0 0 24 24"  fill="none"  stroke="white"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-layout-dashboard {{ Route::is('admin.dashboard') ? 'active' : '' }}"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" /><path d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" /><path d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" /><path d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" /></svg></a>
                {{-- <button class="tooltip-trigger">Hover Me</button> --}}
                <div class="tooltip font-semibold">Dashboard</div>
            </div>

            <div class="tooltip-container">
                 <a href="{{ route('admin.users-data.index') }}"><svg  xmlns="http://www.w3.org/2000/svg"  width="43"  height="43"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users menu-icon {{ Route::is('admin.users-data.index') ? 'active' : '' }}"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg></a>
                {{-- <button class="tooltip-trigger">Hover Me</button> --}}
                <div class="tooltip font-semibold">Users</div>
            </div>

            <div class="tooltip-container">
                <a href="{{ route('admin.departments-data.index') }}"><svg  xmlns="http://www.w3.org/2000/svg"  width="43"  height="43"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-buildings menu-icon {{ Route::is('admin.departments-data.index') ? 'active' : '' }}"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" /><path d="M16 8h2c1 0 2 1 2 2v11" /><path d="M3 21h18" /><path d="M10 12v0" /><path d="M10 16v0" /><path d="M10 8v0" /><path d="M7 12v0" /><path d="M7 16v0" /><path d="M7 8v0" /><path d="M17 12v0" /><path d="M17 16v0" /></svg></a>
                {{-- <button class="tooltip-trigger">Hover Me</button> --}}
                <div class="tooltip font-semibold">Departments</div>
            </div>

            <div class="tooltip-container">
                <a href="{{ route('admin.criterias-data.index') }}"><svg  xmlns="http://www.w3.org/2000/svg"  width="43"  height="43"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit menu-icon {{ Route::is('admin.criterias-data.index') ? 'active' : '' }}"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg></a>
                {{-- <button class="tooltip-trigger">Hover Me</button> --}}
                <div class="tooltip font-semibold">Criterias</div>
            </div>

            
           

        </div>

        <div class="divider"></div>

        <div class="admin-criteria flex flex-col items-center justify-start gap-6 py-8">
            <div class="tooltip-container">
                <a href="{{ route('admin.admin-profile.index') }}"><svg  xmlns="http://www.w3.org/2000/svg"  width="43"  height="43"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-edit menu-icon {{ Route::is('admin.admin-profile.index') ? 'active' : '' }} "><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" /><path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" /></svg></a>
                {{-- <button class="tooltip-trigger">Hover Me</button> --}}
                <div class="tooltip font-semibold">Admin Profile</div>
            </div>

        </div>

        <div class="divider"></div>
        <div class="log-out flex flex-col items-center justify-start py-14">
            <div class="tooltip-container">
                <button type="button" id="showLogoutModal" style="background: none; border: none; padding: 0;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-power menu-icon">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M7 6a7.75 7.75 0 1 0 10 0" />
                        <path d="M12 4l0 8" />
                    </svg>
                </button>
                <div class="tooltip font-semibold">Log Out</div>
            </div>
        </div>

    </div>

    <div class="content">
        <!-- Logout Confirmation Modal -->
        <div id="logoutModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
            <div class="bg-gradient-to-t from-[#05062D] to-[#101493] text-center p-8 rounded-2xl shadow-lg border-white border-4 relative w-[90%] max-w-md">
                <div class="flex justify-center mb-4">
                    <i class="ti ti-alert-triangle text-6xl text-[#FF3E9A]"></i>
                </div>
                <h2 class="text-2xl font-bold text-[#FF3E9A] mb-2">Are you sure?</h2>
                <p class="text-white mb-6">Are you sure you want to proceed? You will be logged out</p>
                <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="flex justify-center gap-4">
                    @csrf
                    <button type="submit" class="px-6 py-2 border-2 border-[#FF3E9A] text-[#FF3E9A] rounded-md hover:bg-[#FF3E9A]/20 cursor-pointer">Logout</button>
                    <button type="button" id="cancelLogout" class="px-6 py-2 border-2 border-[#50FFF6] text-[#50FFF6] rounded-md hover:bg-[#50FFF6]/20 cursor-pointer">Cancel</button>
                </form>
            </div>
        </div>
        @yield('content')
    </div>

    <script>
        document.getElementById('showLogoutModal').addEventListener('click', () => {
            document.getElementById('logoutModal').classList.remove('hidden');
        });

        document.getElementById('cancelLogout').addEventListener('click', () => {
            document.getElementById('logoutModal').classList.add('hidden');
        });
    </script>

</body>
</html>