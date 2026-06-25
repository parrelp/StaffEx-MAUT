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

  <form action="{{ route('admin.criterias-data.save-criteria-weights') }}" method="POST">
    @csrf
    <div class="title mt-10 flex gap-4 items-center justify-between w-full">
      <div class="flex items-center gap-2">
        <i class="ti ti-edit text-4xl"></i>
        <h1 class="text-2xl font-medium text-white/80">Criterias Data</h1>
      </div>
      {{-- tombol untuk generate ranking kandidat --}}
      <div class="button-save-add flex gap-2">
          <button type="submit" class="generate-rank-btn bg-gradient-to-b from-amber-400/20 to-amber-400/20 px-10 py-2 border-2 border-amber-400 rounded-l-2xl  cursor-pointer flex items-center gap-2">
              <i class="ti ti-check text-2xl text-amber-400"></i>
              <p class="text-xl text-amber-400">Save Weight</p>
          </button>
        <a href="{{ route('admin.criterias-data.add-criteria') }}">
          <button type="button" class="generate-rank-btn bg-gradient-to-b from-white/20 to-white/10 px-10 py-2 border-2 border-white rounded-r-2xl cursor-pointer flex items-center gap-2">
              <i class="ti ti-plus text-2xl"></i>
              <p class="text-xl">Add Criteria</p>
          </button>
        </a>
        
      </div>
    </div>
  
    <div class="divider"></div>
  
    <div class="criterias-table w-full mt-6">
      <table class="table-auto w-full border-separate border-spacing-4 ">
        <thead>
          <tr>
            <th>Code</th>
            <th>Criteria Name</th>
            <th>Weight Value</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($criterias as $criteria)
          <tr>
            <td class="text-center">{{ $criteria->code }}</td>
            <td class="text-center">{{ $criteria->name }}</td>
            <td>
              <div class="criteria weight mb-6">
                <div class="w-full inline-flex">
                  <input
                    class="w-full rounded-l-lg bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white"
                    placeholder="Enter Weight"
                    name="weights[{{ $criteria->id_criteria }}]"
                    type="number"
                    min="0"
                    max="100"
                    step="0.01"
                    value="{{ $criteria->weight * 100 }}"
                  />
                  <div class="w-1/12 pt-2 bg-white flex justify-center items-center rounded-r-lg">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-percentage text-slate-400 mx-auto"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M7 7m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M6 18l12 -12" /></svg> 
                  </div>
                </div>
              </div>
            </td>
            <td class="flex justify-center items-center">
              <a href="{{ route('admin.criterias-data.edit-criteria', $criteria->id) }}">
                <button type="button" class="generate-rank-btn bg-gradient-to-b from-white/20 to-white/10 px-10 py-2 border-2 border-white rounded-lg cursor-pointer flex items-center gap-2">
                    <i class="ti ti-edit text-2xl"></i>
                    <p class="text-xl">Edit Criteria</p>
                </button>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </form>



</div>
@endsection


