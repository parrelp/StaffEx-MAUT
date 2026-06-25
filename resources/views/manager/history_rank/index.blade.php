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
    <div class="title mt-10 flex gap-4 items-center justify-between w-full">
        <div class="flex items-center gap-2">
            <i class="ti ti-chart-bar text-4xl"></i>
            <h1 class="text-2xl font-medium">History Rank</h1>
        </div>
    </div>

    <div class="divider"></div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        @foreach($histories as $history)
            <a href="{{ route('manager.history-rank.show', $history->id_history) }}">
                <div class="p-4 border rounded-xl shadow hover:shadow-md transition">
                    <h2 class="text-xl font-bold">{{ $history->department->name }}</h2>
                    <p class="text-sm text-white/70 mt-1">
                        Disimpan oleh: {{ $history->user->name }} <br>
                        Tanggal: {{ \Carbon\Carbon::parse($history->saved_at)->format('d M Y H:i') }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
