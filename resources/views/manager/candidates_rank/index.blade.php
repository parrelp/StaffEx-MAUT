@extends('layouts.manager.app')

@section('content')

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





<div class="container ms-30">
    

    
  <div class="best-candidates">
    <div class="title mt-10 flex gap-4 items-center justify-between w-full">
        <div class="flex items-center gap-2">
            <i class="ti ti-chart-bar text-4xl"></i>
            <h1 class="text-2xl font-medium">Best Candidates</h1>
        </div>
        {{-- tombol untuk generate ranking kandidat --}}
        <div class="button-group flex gap-2">
            <form action="{{ route('manager.history-rank.save-history') }}" method="POST">
            @csrf
                <button type="submit" class="generate-rank-btn bg-gradient-to-b from-amber-400/20 to-amber-400/10 px-10 py-2 border-2 border-amber-400 rounded-tl-2xl rounded-br-2xl cursor-pointer flex items-center gap-2">
                    <i class="ti ti-file text-2xl text-amber-400"></i>
                    <p class="text-xl text-amber-400">Save Final Rank</p>
                </button>
            </form>
            <form action="{{ route('manager.candidate-rank.generate') }}" method="POST">
            @csrf
                <button type="submit" class="generate-rank-btn bg-gradient-to-b from-white/20 to-white/10 px-10 py-2 border-2 border-white rounded-tl-2xl rounded-br-2xl cursor-pointer flex items-center gap-2">
                    <i class="ti ti-rotate-clockwise-2 text-2xl"></i>
                    <p class="text-xl">Generate Rank</p>
                </button>
            </form>

        </div>
    </div>
  
    <div class="divider"></div>
    <div class="candidates-list mt-10 grid grid-cols-3 gap-10">
        @foreach($bestCandidates as $index => $score)
        <a href="{{ route('manager.candidate-rank.stats', $score->candidate->id_candidate) }}" class="card-candidate">
            <div class="first-content">
                <img src="{{ $score->candidate->photo_url }}" alt="{{ $score->candidate->name }}" class="candidate-img">
                <div class="ranking">#{{ $index + 1 }}</div>
                <div class="name-vertical">{{ strtoupper($score->candidate->first_name) }}</div>
                <div class="status-box flex gap-8 justify-center items-center">
                    <div class="divide"></div>
                    <div class="candidate-final-score flex flex-col items-center justify-center">
                        <p class="score font-bold text-[#183676] text-xl italic">{{ number_format($score->final_score, 2) }}</p>
                        <p class="text text-gray-400 italic">final score</p>
                    </div>
                    <div class="divide"></div>
                </div>
            </div>
            <div class="second-content">
                <div class="corner-elements"><span></span><span></span><span></span><span></span></div>
                <div class="plus-elements"><span></span><span></span><span></span><span></span></div>
                <div class="stat flex flex-col items-center">
                    <span class="font-bold">Lihat</span>
                    <span class="font-bold">Statistik</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>

  </div>
  <div class="other-candidates">
    <div class="title mt-10 flex gap-2 items-center mb-8">
      <i class="ti ti-list-details text-xl"></i>
      <h1 class="text-xl font-medium">Other Candidates</h1>
    </div>

    <div class="other-list">
        @foreach($otherCandidates as $index => $score2)
        <div class="card-other-candidate w-full flex gap-8 py-4 px-8 items-center mb-4">
            <div class="rank-number text-2xl font-bold">#{{ $index + 1 }}</div>
            <div class="candidate-details w-full grid grid-cols-12 items-center">
                <div class="candidate-profile col-span-5 flex gap-4 items-center">
                    <img src="{{ $score2->candidate->photo_url }}" alt="{{ $score2->candidate->name }}" class="h-14 w-14 rounded-full object-cover">
                    <div class="candidate-name">
                        <p class="text-2xl font-semibold">{{ $score2->candidate->name }}</p>
                    </div>
                </div>
                <div class="candidate-final-score col-span-5 flex flex-col items-center">
                    <p class="score font-bold text-white text-xl italic">{{ number_format($score2->final_score, 2) }}</p>
                    <p class="text text-gray-200 italic">final score</p>
                </div>
                <div class="col-span-2">
                    <a href="{{ route('manager.candidate-rank.stats', $score2->candidate->id_candidate) }}">
                        <div class="more-info flex items-center gap-2 justify-end ">
                            <p class="text-lg ">Lihat Detail</p>
                            <i class="ti ti-external-link text-4xl cursor-pointer"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

  </div>


</div>
@endsection
