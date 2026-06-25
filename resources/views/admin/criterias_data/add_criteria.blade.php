@extends('layouts.admin.app')

@section('content')
<div class="container ms-30">
  <div class="title mt-10 flex flex-col gap-2">
    <h1 class="type text-[32px] text-white/90 font-semibold">Add Criteria</h1>
  </div>
  
  <div class="divider"></div>

  {{-- form --}}
  <div class="grid-form mt-10 grid grid-cols-2 gap-10 mb-6">
    <div class="left-form flex justify-center items-center border-4 border-white bg-white/20 rounded">
      <i class="ti ti-edit text-8xl"></i>

    </div>
    <div class="right-form">

      {{-- candidate name --}}
      <div class="criteria-code mb-6">
        <div class="w-full inline-flex">
          <div class="w-1/12 pt-2 bg-white flex justify-center items-center rounded-l-lg">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-barcode text-slate-400 mx-auto"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M8 13h1v3h-1z" /><path d="M12 13v3" /><path d="M15 13h1v3h-1z" /></svg> 
          </div>
          <input
            class="w-full rounded-r-lg bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white"
            placeholder="Enter criteria code"
            name="code"
            type="text"
          />
        </div>
      </div>
      {{-- candidate name --}}
      <div class="criteria-name mb-6">
        <div class="w-full inline-flex">
          <div class="w-1/12 pt-2 bg-white flex justify-center items-center rounded-l-lg">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-criteria text-gray-400 mx-auto"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg> 
          </div>
          <input
            class="w-full rounded-r-lg bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white"
            placeholder="Enter criteria name"
            name="name"
            type="text"
          />
        </div>
      </div>

      {{-- button clear --}}
      <div class="input-clear">
        <button class="btn-clear bg-[#FF3E9A]/50 border-4 border-[#FF3E9A] w-full py-4 flex justify-center rounded cursor-pointer">Clear</button>
      </div>
    </div>
  </div>
  {{-- button submit --}}
  <div class="submit-button">
      <button class="btn-clear bg-[#3ACBD4]/50 border-4 border-[#3ACBD4] w-full py-4 flex justify-center rounded cursor-pointer">Submit</button>
  </div>


</div>
@endsection


