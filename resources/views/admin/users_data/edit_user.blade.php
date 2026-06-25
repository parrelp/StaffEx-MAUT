@extends('layouts.admin.app')

@section('content')
@if ($errors->any())
  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="container ms-30">
  <div class="title mt-10 flex gap-4 items-center justify-between w-full">
    <div class="flex items-center gap-2">
      <i class="ti ti-user-edit text-4xl"></i>
      <h1 class="text-2xl font-medium text-white/80">Edit User</h1>
    </div>
    {{-- tombol untuk generate ranking kandidat --}}
    <a href="{{ route('admin.users-data.add-to-manager', $user->id_user) }}">
      <button type="submit" class="generate-rank-btn bg-gradient-to-b from-white/20 to-white/10 px-10 py-2 border-2 border-white rounded-tl-2xl rounded-br-2xl cursor-pointer flex items-center gap-2">
          <i class="ti ti-user-cog text-2xl"></i>
          <p class="text-xl">Add to Department Manager</p>
      </button>
    </a>
  </div>
  
  <div class="divider"></div>

  {{-- form --}}

  <form action="{{ route('admin.users-data.update-user', $user->id_user) }}" method="POST">
  @csrf
  @method('PUT')

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
              class="w-full rounded-r-lg bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white"
              placeholder="Enter name"
              name="name"
              value="{{ old('name', $user->name) }}"
              type="text"
            />
          </div>
        </div>
        {{-- candidate class --}}
        <div class="user-role mb-6">
          <!-- From Uiverse.io by hoshikawamaki --> 
          <h2 class="block text-white text-sm font-bold mb-2"
            >Choose Role</h2
          >
          <div
            class="flex space-x-2 border-[3px] border-white rounded-xl select-none"
          >
            <label
              class="radio flex flex-grow items-center justify-center rounded-lg p-1 cursor-pointer"
            >
              <input
                type="radio"
                name="role"
                value="admin"
                class="peer hidden"
                checked=""
                {{ $user->role == 'admin' ? 'checked' : '' }}
              />
              <span
                class="tracking-widest peer-checked:w-full peer-checked:text-center peer-checked:bg-gradient-to-r peer-checked:from-[#fff]/50 peer-checked:to-[#fff]/50 peer-checked:text-white text-white p-2 rounded-lg transition duration-150 ease-in-out font-semibold"  
                >Admin</span
              >
            </label>
            
  
            <label
              class="radio flex flex-grow items-center justify-center rounded-lg p-1 cursor-pointer"
            >
            
              <input type="radio" name="role" value="manager" class="peer hidden" {{ $user->role == 'manager' ? 'checked' : '' }}/>
              <span
                class="tracking-widest peer-checked:w-full peer-checked:text-center peer-checked:bg-gradient-to-r peer-checked:from-[#fff]/50 peer-checked:to-[#fff]/50 peer-checked:text-white text-white p-2 rounded-lg transition duration-150 ease-in-out font-semibold"
                >manager</span
              >
            </label>
          </div>
  
        </div>
        {{-- candidate email--}}
        <div class="user-email mb-6">
          <div class="w-full inline-flex">
            <div class="w-1/12 pt-2 bg-white flex justify-center items-center rounded-l-lg">
              <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mail text-gray-400 mx-auto"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
            </div>
            <input
              class="w-full rounded-r-lg bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white"
              placeholder="Enter email"
              name="email"
              value="{{ old('email', $user->email) }}"
              type="text"
            />
          </div>
        </div>
        {{-- password --}}
        <div class="user-password mb-6">
          <div class="w-full inline-flex">
            <div class="w-1/12 pt-2 bg-white flex justify-center items-center rounded-l-lg">
              <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-lock text-gray-400 mx-auto"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" /><path d="M8 11v-4a4 4 0 1 1 8 0v4" /></svg>
            </div>
            <input
              class="w-full rounded-r-lg bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white"
              placeholder="Enter new password (optional)"
              name="password"
              type="password"
            />
          </div>
        </div>
        {{-- confirm password--}}
        <div class="confirm-user-password mb-6">
          <div class="w-full inline-flex">
            <div class="w-1/12 pt-2 bg-white flex justify-center items-center rounded-l-lg">
              <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-lock-check text-gray-400 mx-auto"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v.5" /><path d="M8 11v-4a4 4 0 1 1 8 0v4" /><path d="M15 19l2 2l4 -4" /></svg>
            </div>
            <input
              class="w-full rounded-r-lg bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white"
              placeholder="Confirm password"
              name="password_confirmation"
              type="password"
            />
          </div>
        </div>
  
        {{-- button clear --}}
        {{-- <div class="input-clear">
          <button class="btn-clear bg-[#FF3E9A]/50 border-4 border-[#FF3E9A] w-full py-4 flex justify-center rounded cursor-pointer">Clear</button>
        </div> --}}
      </div>
    </div>
    {{-- button submit --}}
    <div class="submit-button">
        <button type="submit" class="btn-clear bg-[#3ACBD4]/50 border-4 border-[#3ACBD4] w-full py-4 flex justify-center rounded cursor-pointer">Submit</button>
    </div>

  </form>


</div>
@endsection


