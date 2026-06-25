@extends('layouts.admin.app')


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
        <i class="ti ti-buildings text-2xl"></i>
        <h1 class="text-xl font-medium text-white/80"><span class="text-white font-bold">{{ $department->name }}</span> Candidates List</h1>
      </div>
      {{-- tombol untuk generate ranking kandidat --}}
      <a href="{{ route('admin.departments-data.add-candidate-department', ['id' => $department->id_department]) }}">
        <button type="submit" class="generate-rank-btn bg-gradient-to-b from-white/20 to-white/10 px-10 py-2 border-2 border-white rounded-tl-2xl rounded-br-2xl cursor-pointer flex items-center gap-2">
            <i class="ti ti-plus-2 text-2xl"></i>
            <p class="text-xl">Add Candidate</p>
        </button>
      </a>
    </div>

  <div class="divider"></div>

  <div class="candidates-list mt-10 grid grid-cols-3 gap-10">
    {{-- @if ($candidates->isEmpty())
      <p class="text-red-500">Tidak ada kandidat untuk departemen ini.</p>
    @endif --}}

    {{-- card candidate --}}
    {{-- Loop semua kandidat --}}
    @forelse ($candidates as $candidate)
      <a href="{{ route('admin.departments-data.edit-candidate-department', $candidate->id_candidate) }}">
        <div id="card-candidate" class="card-candidate">
          <div class="first-content">
            <img src="{{ $candidate->photo ? asset('storage/images/' . $candidate->photo) : asset('storage/images/user.png') }}" alt="" class="candidate-img">

            <div class="name-vertical">{{ $candidate->first_name }}</div>
            <div class="status-box flex gap-8 justify-center items-center">
              <div class="divide"></div>
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
            <span class="font-bold flex flex-col items-center">
              <p>Click</p>
              <p>to Edit</p>
            </span>
          </div>
        </div>
      </a>
    @empty
      <p class="text-red-500">Tidak ada kandidat untuk departemen ini.</p>
    @endforelse

  </div>


</div>
@endsection


