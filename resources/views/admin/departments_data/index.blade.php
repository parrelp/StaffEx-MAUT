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
  <div class="title mt-10 flex gap-4 items-center">
      <i class="ti ti-buildings text-2xl"></i>
      <h1 class="text-xl font-medium">Departments Data</h1>
  </div>

  <div class="divider"></div>

  <div class="departments-list mt-10 grid grid-cols-3 gap-10">
    @forelse ($departments as $department)
    <a href="{{ route('admin.departments-data.details-department', ['id' => $department->id_department]) }}">
      <div id="card-department" class="card-department bg-white border-4 border-white rounded-2xl flex flex-col justify-between items-center h-[50vh]">
        <div class="department-image flex justify-center items-center h-full">
          <img src="{{ asset('storage/images/' . (!empty($department->department_photo) ? $department->department_photo : 'building.png')) }}" alt="" class="w-[240px] h-[240px]">
        </div>
          <div class="bottom-card flex flex-col justify-center items-center py-2 bg-white w-full">
            <div class="department-name font-bold text-2xl text-[#183676]">{{ $department->name }}</div>
            <div class="type italic text-[#979797]">{{ $department->type }}</div>
          </div>
      </div>
    </a>
    @empty
      <p class="text-red-500">Tidak ada department terdaftar.</p>
    @endforelse
    <a href="{{ route('admin.departments-data.add-department') }}">
      <div id="add-departments" class="add-departments bg-gradient-to-b from-white/20 to-white/10 border-4 border-white rounded-2xl p-8 flex flex-col justify-center items-center h-[50vh]">
          <i class="ti ti-plus text-[100px]"></i>
          <h2>Add Department</h2>
      </div>
    </a>
  </div>


</div>
@endsection


