<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Candidate - Stats</title>
    <script src="https://unpkg.com/@tabler/icons@latest/iconfont/tabler-icons.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/style.css'])
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        body {
            margin: 0;
            font-family: "Montserrat", sans-serif;
            background: linear-gradient(to right, #1C2256, #166AC0, #183676);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
  
  <div class="container m-auto w-full">
    {{-- Back Button --}}
    <div class="mb-4">
      <a href="{{ route('manager.candidate-rank.index') }}"
         class="inline-flex items-center gap-2 px-4 py-2 bg-white text-[#1B2A62] font-semibold rounded shadow hover:bg-gray-100 transition">
         <i class="ti ti-arrow-left"></i> Back
      </a>
    </div>
    <div class="card-stats flex border-[8px] border-[#3178C8] rounded-[16px] overflow-hidden relative h-[43.75rem]">
        {{-- Background split --}}
        <div class="absolute left-0 top-0 w-[30%] h-full bg-white z-0"></div>
        <div class="absolute left-[30%] top-0 w-[70%] h-full bg-gradient-to-r from-[#1873CC] to-[#1B2A62] z-0"></div>

        {{-- Rank Text --}}
        <div class="absolute left-10 top-10 text-9xl font-bold text-[#1B2A62] z-10">
            #{{ $score->rank ?? '-' }}
        </div>

        {{-- Candidate Photo --}}
        <div class="absolute left-[30%] top-1/2 transform -translate-x-80 -translate-y-70 z-10">
            <img src="{{ $score->candidate->photo_url }}" alt="{{ $score->candidate->name }}" class="h-[665px] w-[560px] object-cover">
        </div>

        {{-- Right Content --}}
        <div class="ml-[42%] relative z-10 w-full p-10 text-white flex flex-col justify-center">
            {{-- Name and Score Circle --}}
            <div class="flex justify-between items-start">
                <div class="">
                  <h1 class="text-[76px] font-bold leading-[70px]">
                      {{ Str::upper(Str::headline(explode(' ', $score->candidate->name)[0])) }}
                  </h1>
                  <h2 class="text-[36px] font-bold leading-[40px] stroke-white" style="-webkit-text-stroke: 1px white; color: transparent;">
                      {{ Str::upper(Str::headline(Str::after($score->candidate->name, ' '))) }}
                  </h2>
                </div>

                <div class="relative w-[100px] h-[100px]">
                    <svg viewBox="0 0 36 36" class="w-full h-full">
                        <path
                            class="text-gray-300"
                            d="M18 2.0845
                               a 15.9155 15.9155 0 0 1 0 31.831
                               a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="4"/>
                        <path
                            class="text-[#64AAFF]"
                            d="M18 2.0845
                               a 15.9155 15.9155 0 0 1 0 31.831"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="4 "/>             
                            stroke-dasharray="{{ number_format($score->final_score * 100, 2) }}, 100"/>
                    </svg>
                    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center text-white text-lg font-bold">
                        {{ number_format($score->final_score, 2) }}
                    </div>
                </div>
            </div>

            <div class="border-b border-white opacity-50 my-4"></div>

            {{-- Criteria Score Bars --}}
            <div class="flex flex-col gap-2 mt-4">
                @foreach ($criteriaScores as $item)
                    <div>
                        <p class="text-sm font-reguler mb-2">{{ $item->criteria }}</p>
                        <div class="w-full h-4 border-2 border-white rounded-full overflow-hidden mb-2">
                            <div class="h-full bg-[#64AAFF]" style="width: {{ min(($item->score / $item->weight) * 100, 100) }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
  </div>
</body>
</html>
