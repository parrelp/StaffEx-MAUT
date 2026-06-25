@php use Illuminate\Support\Str; @endphp

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
  <div class="title mt-10 flex gap-4 items-center">
      <i class="ti ti-users text-2xl"></i>
      <h1 class="text-xl font-medium">Candidates List</h1>
  </div>

  <div class="divider"></div>

  <div class="candidates-list mt-10 grid grid-cols-3 gap-10">
    @if ($candidates->isEmpty())
      <p class="text-red-500">Tidak ada kandidat untuk departemen ini.</p>
    @endif

    {{-- card candidate --}}
    {{-- Loop semua kandidat --}}
    @foreach ($candidates as $candidate)
    <a href="{{ route('manager.candidate-eval.index', $candidate->id_candidate) }}">
      <div id="card-candidate" class="card-candidate">
        <div class="first-content">
          <img src="{{ asset('storage/images/' . (!empty($candidate->photo) ? $candidate->photo : 'user.png')) }}" alt="{{ $candidate->name }}" class="candidate-img">
  
          <div class="name-vertical">{{ $candidate->first_name }}</div>
          <div class="status-box flex gap-8 justify-center items-center">
            <div class="divide"></div>
            <div class="candidate-status font-bold text-xl
              {{ $candidate->status === 'sudah_dinilai' ? 'text-green-400' : ($candidate->status === 'sedang_dinilai' ? 'text-yellow-400' : 'text-red-400') }}">
              {{ ucwords(str_replace('_', ' ', $candidate->status)) }}
            </div>
            <div class="divide"></div>
          </div>
        </div>
        <div class="second-content">
          <div class="corner-elements">
            <span></span><span></span><span></span><span></span>
          </div>
          <div class="plus-elements">
            <span></span><span></span><span></span><span></span>
          </div>
          <span class="font-bold">NILAI</span>
        </div>
      </div>
    </a>
    @endforeach
  </div>


</div>
@endsection
