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
      <i class="ti ti-users text-4xl"></i>
      <h1 class="text-2xl font-medium text-white/80">Users Data</h1>
    </div>
    {{-- tombol untuk generate ranking kandidat --}}
    <a href="{{ route('admin.users-data.add-user') }}">
      <button type="submit" class="generate-rank-btn bg-gradient-to-b from-white/20 to-white/10 px-10 py-2 border-2 border-white rounded-tl-2xl rounded-br-2xl cursor-pointer flex items-center gap-2">
          <i class="ti ti-plus-2 text-2xl"></i>
          <p class="text-xl">Add User</p>
      </button>
    </a>
  </div>

  <div class="divider"></div>

  {{-- views/admin/users_data/index.blade.php --}}

  <div class="candidates-list mt-10 grid grid-cols-3 gap-10">
    @forelse ($users as $user)
      <a href="{{ route('admin.users-data.edit-user', ['id' => $user->id_user]) }}">
        <div id="card-candidate" class="card-candidate relative">
          <div class="first-content">
            <img src="{{ asset('storage/images/user.png') }}" alt="" class="user-image">
            {{-- <div class="name-horizontal font-bold ">{{ $user->name }}</div> --}}
            <div class="bottom-card flex flex-col justify-center items-center py-2 bg-white w-full bottom-0 absolute">
              <div class="department-name font-bold text-2xl text-[#183676]">{{ $user->name }}</div>
              <div class="type italic text-[#979797]">{{ $user->role }}</div>
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
      <p class="text-red-500">Tidak ada user terdaftar.</p>
    @endforelse
  </div>


</div>
@endsection


