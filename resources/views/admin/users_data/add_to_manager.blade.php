@extends('layouts.admin.app')

@section('content')
<div class="container ms-30">
  <div class="title mt-10 flex flex-col gap-2">
    <h1 class="type text-[32px] text-white/90 font-semibold">Add User to Department Manager</h1>
  </div>
  
  <div class="divider"></div>

  {{-- form --}}
  {{-- @if($existingManager)
    <div class="bg-yellow-100 text-black p-4 rounded mb-4">
        <strong>Debug Info:</strong><br>
        Manager ID: {{ $existingManager->id_manager }}<br>
        Department ID: {{ $existingManager->department_id }}<br>
        Position: {{ $existingManager->position }}
    </div>
  @else
    <div class="bg-red-100 text-black p-4 rounded mb-4">
        <strong>Debug Info:</strong><br>
        User ini belum terdaftar sebagai manager.
    </div>
  @endif --}}
@if($errors->any())
  <div class="bg-red-100 text-red-700 p-2 rounded">
    <ul class="list-disc list-inside">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('admin.users-data.store-manager') }}" method="POST">
  @csrf
  <input type="hidden" name="user_id" value="{{ $user->id_user }}">
  <div class="grid-form mt-10 grid grid-cols-2 gap-10 mb-6">
    <div class="left-form flex justify-center border-4 border-white bg-white/20 rounded">
      <img src="{{ asset('storage/images/user.png') }}" alt="" class="user-image ">

    </div>
    <div class="right-form">

      {{-- candidate name --}}
      <div class="user-name mb-6">
        <div class="w-full inline-flex">
          <div class="w-1/12 pt-2 bg-white flex justify-center items-center rounded-l-lg">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user text-gray-400 mx-auto"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg> 
          </div>
          <input
            class="w-full rounded-r-lg bg-gradient-to-r from-white/20 to-white/20 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white cursor-not-allowed font-semibold tracking-wide"
            placeholder="Enter name"
            name="name"
            type="text"
            value="{{ $user->name }}"
            disabled
          />
        </div>
      </div>
      {{-- candidate class --}}
      <div class="user-poition mb-6">
        <!-- From Uiverse.io by hoshikawamaki --> 
        <h2 class="block text-white text-sm font-bold mb-2"
          >Choose Manager Position</h2
        >
        <div
          class="flex space-x-2 border-[3px] border-white rounded-xl select-none"
        >
          <label
            class="radio flex flex-grow items-center justify-center rounded-lg p-1 cursor-pointer"
          >
            <input
              type="radio"
              name="position"
              value="head"
              required
              {{ (old('position') ?? $existingManager?->position) === 'head' ? 'checked' : '' }}
              class="peer hidden"
              
            />
            <span
              class="tracking-widest peer-checked:w-full peer-checked:text-center peer-checked:bg-gradient-to-r peer-checked:from-[#fff]/50 peer-checked:to-[#fff]/50 peer-checked:text-white text-white p-2 rounded-lg transition duration-150 ease-in-out font-semibold"  
              >Head</span
            >
          </label>
          

          <label
            class="radio flex flex-grow items-center justify-center rounded-lg p-1 cursor-pointer"
          >
          
            <input type="radio" name="position" value="bph" class="peer hidden" required {{ (old('position') ?? $existingManager?->position) === 'bph' ? 'checked' : '' }}  />
            <span
              class="tracking-widest peer-checked:w-full peer-checked:text-center peer-checked:bg-gradient-to-r peer-checked:from-[#fff]/50 peer-checked:to-[#fff]/50 peer-checked:text-white text-white p-2 rounded-lg transition duration-150 ease-in-out font-semibold"
              >BPH</span
            >
          </label>
        </div>

      </div>
      {{-- candidate email--}}
      <div class="user-email mb-6">
        <div class="w-full inline-flex">
          <div class="w-1/12 pt-2 bg-white flex justify-center items-center rounded-l-lg">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-buildings text-gray-400 mx-auto"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" /><path d="M16 8h2c1 0 2 1 2 2v11" /><path d="M3 21h18" /><path d="M10 12v0" /><path d="M10 16v0" /><path d="M10 8v0" /><path d="M7 12v0" /><path d="M7 16v0" /><path d="M7 8v0" /><path d="M17 12v0" /><path d="M17 16v0" /></svg>
          </div>
          <select class="w-full rounded-r-lg bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-[#101493] focus:border-white focus:outline-none focus:ring-2 focus:ring-white" id="department" name="department_id" required>
            <option value="" disabled {{ old('department_id') === null && !$existingManager ? 'selected' : '' }}>Select Department</option>
            @foreach($departments as $dept)
              <option value="{{ $dept->id_department }}"
                {{ (string) old('department_id', $existingManager?->department_id) === (string) $dept->id_department ? 'selected' : '' }}>
                {{ $dept->name }}
              </option>



            @endforeach
            {{-- @foreach($departments as $dept)
              @php
                  $selectedDeptId = old('department_id') ?? $existingManager?->department_id;
              @endphp
              <option value="{{ $dept->id }}"
                  {{ $selectedDeptId == $dept->id ? 'selected' : '' }}>
                  {{ $dept->name }}
              </option>
            @endforeach --}}

        </select>
        </div>
      </div>

      {{-- button clear --}}
      <div class="input-clear">
        <button type="reset" class="btn-clear bg-[#FF3E9A]/50 border-4 border-[#FF3E9A] w-full py-4 flex justify-center rounded cursor-pointer">Clear</button>
      </div>
    </div>
  </div>
  {{-- button submit --}}
  <div class="submit-button">
      <button type="submit" class="btn-clear bg-[#3ACBD4]/50 border-4 border-[#3ACBD4] w-full py-4 flex justify-center rounded cursor-pointer">
        {{ $existingManager ? 'Update' : 'Submit' }}
      </button>
  </div>

</form>


</div>
@endsection


