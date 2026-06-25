
@extends('layouts.admin.app')

@section('content')
<div class="container ms-30">
  <div class="title mt-10 flex flex-col gap-2">
    <h1 class="type text-[32px] text-white/50 font-semibold">{{ $department->name }}</h1>
    <h1 class="department-name text-[80px] font-bold text-white tracking-wide">{{ $department->description }}</h1>
  </div>
  
  <div class="divider"></div>

  {{-- card --}}
  <div class="cards-detail-department mt-10 grid grid-cols-3 gap-10">
    <a href="{{ route('admin.departments-data.edit-department', ['id' => $department->id_department]) }}">
      <div id="card-edit-department" class="card-edit-department bg-white border-4 border-white rounded-2xl flex flex-col justify-between items-center h-[50vh]">
        <div class="department-image flex justify-center items-center h-full">
          <img src="{{ asset('storage/images/' . (!empty($department->department_photo) ? $department->department_photo : 'building.png')) }}" alt="{{ $department->name }}" alt="" class="w-[240px] h-[240px]">
        </div>
          <div class="bottom-card flex flex-col justify-center items-center py-2 bg-white w-full">
            <div class="department-name font-bold text-2xl text-[#183676]">Edit Department</div>
            <div class="type italic text-[#979797]">Department</div>
          </div>
      </div>
    </a>
    <a href="{{ route('admin.departments-data.candidates-department-list' , ['id' => $department->id_department]) }}">
      <div id="card-candidates-department-list" class="card-candidates-department-list bg-gradient-to-b from-white/20 to-white/10 border-4 border-white rounded-2xl flex flex-col justify-between items-center h-[50vh]">
        <div class="department-image flex justify-center items-center h-full">
          <i class="ti ti-users text-8xl"></i>
        </div>
          <div class="bottom-card flex flex-col justify-center items-center py-2 bg-white w-full">
            <div class="department-name font-bold text-2xl text-[#183676]">Candidates List</div>
            <div class="type italic text-[#979797]">Candidates</div>
          </div>
      </div>
    </a>
    <a href="#">
      <div id="card-details-department" class="card-details-department bg-gradient-to-b from-white/20 to-white/10 border-4 border-white rounded-2xl flex flex-col justify-between items-center h-[50vh]">
        <div class="department-image flex justify-center items-center h-full">
          <i class="ti ti-user-cog text-8xl"></i>
        </div>
          <div class="bottom-card flex flex-col justify-center items-center py-2 bg-white w-full">
            <div class="department-name font-bold text-2xl text-[#183676]">Manager List</div>
            <div class="type italic text-[#979797]">Managers</div>
          </div>
      </div>
    </a>

  </div>



</div>
@endsection

