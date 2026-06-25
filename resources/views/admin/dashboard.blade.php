@extends('layouts.admin.app')

@section('content')
<div class="container ms-30">
  <div class="title mt-10 flex flex-col gap-2">
    <h1 class="type text-[32px] text-white/50 font-semibold">Admin</h1>
    <h1 class="department-name text-[80px] font-bold text-white tracking-wide">Himpunan Mahasiswa TIK</h1>
  </div>
  
  <div class="divider"></div>

  {{-- card --}}
  <div class="cards-detail-department mt-10 grid grid-cols-3 gap-10">
    <a href="{{ route('admin.users-data.index') }}">
      <div id="card-users" class="card-users bg-gradient-to-b from-white/20 to-white/10 border-4 border-white rounded-2xl flex flex-col justify-between items-center h-[50vh]">
        <div class="users-image flex justify-center items-center h-full">
          <i class="ti ti-users text-8xl"></i>
        </div>
          <div class="bottom-card flex flex-col justify-center items-center py-2 bg-white w-full">
            <div class="users-name font-bold text-2xl text-[#183676]">Users Data</div>
            <div class="type italic text-[#979797]">Users</div>
          </div>
      </div>
    </a>
    <a href="{{ route('admin.departments-data.index') }}">
      <div id="card-department" class="card-department bg-gradient-to-b from-white/20 to-white/10 border-4 border-white rounded-2xl flex flex-col justify-between items-center h-[50vh]">
        <div class="department-image flex justify-center items-center h-full">
          <i class="ti ti-buildings text-8xl"></i>
        </div>
          <div class="bottom-card flex flex-col justify-center items-center py-2 bg-white w-full">
            <div class="department-name font-bold text-2xl text-[#183676]">Department Data</div>
            <div class="type italic text-[#979797]">Department</div>
          </div>
      </div>
    </a>
    <a href="{{ route('admin.criterias-data.index') }}">
      <div id="card-criterias" class="card-criterias bg-gradient-to-b from-white/20 to-white/10 border-4 border-white rounded-2xl flex flex-col justify-between items-center h-[50vh]">
        <div class="criterias-image flex justify-center items-center h-full">
          <i class="ti ti-edit text-8xl"></i>
        </div>
          <div class="bottom-card flex flex-col justify-center items-center py-2 bg-white w-full">
            <div class="criterias-name font-bold text-2xl text-[#183676]">Criterias Data</div>
            <div class="type italic text-[#979797]">Criterias</div>
          </div>
      </div>
    </a>
  </div>



</div>
@endsection


