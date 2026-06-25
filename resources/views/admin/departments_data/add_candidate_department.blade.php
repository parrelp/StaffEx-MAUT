@extends('layouts.admin.app')

@section('content')
@if ($errors->any())
  <div class="text-red-500">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
<div class="container ms-30">
  <div class="title mt-10 flex flex-col gap-2">
    <h1 class="type text-[32px] text-white/90 font-semibold">Add Candidate</h1>
  </div>
  
  <div class="divider"></div>

  <form action="{{ route('admin.departments-data.store-candidate-department', ['id' => $department->id_department]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="department_id" value="{{ $department->id_department }}">
    {{-- form --}}
    <div class="grid-form mt-10 grid grid-cols-2 gap-10 mb-6">
      <div class="left-form">
        {{-- candidate name --}}
        <div class="candidate-name mb-6">
          <input
            class="w-full rounded bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white"
            placeholder="Enter Candidate name.."
            name="name"
            required
          />
        </div>
        {{-- candidate class --}}
        <div class="candidate-class mb-6">
          <input
            class="w-full rounded bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white"
            placeholder="Enter Candidate class.."
            name="class"
            required
          />
        </div>
        {{-- upload photo --}}
        <div class="add-image h-full">
          <div class="upload-box mb-4">
            <div class="group/dropzone">
              <div class="relative rounded-xl border-2 border-dashed border-slate-700 bg-slate-900/50 p-8">
                <input type="file" name="photo" class="absolute inset-0 z-50 h-full w-full cursor-pointer opacity-0"/>
                <div class="space-y-6 text-center">
                  <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-slate-900">
                    <svg class="h-10 w-10 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6"/>
                    </svg>
                  </div>
                  <div class="space-y-2">
                    <p class="text-base font-medium text-white">Drop your files here or browse</p>
                    <p class="text-sm text-slate-400">Support files: JPG, PNG</p>
                    <p class="text-xs text-slate-400">Max file size: 10MB</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="right-form">
        {{-- candidate email--}}
        <div class="candidate-email mb-6">
          <input
            class="w-full rounded bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white"
            placeholder="Enter Candidate email.."
            name="email"
            required
          />
        </div>
        {{-- candidate phone number --}}
        <div class="candidate-phone-number mb-6">
          <input
            class="w-full rounded bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white"
            placeholder="Enter Candidate phone number.."
            name="phone_number"
            required
          />
        </div>
        {{-- input docuiment form--}}
        {{-- <div class="candidate-docs mb-6">
          <div class="grid w-full items-center gap-1.5">
                <input id="document" type="file" class="flex h-10 w-full rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium">
          </div>
  
        </div> --}}
        {{-- input desc --}}
        <div class="department-desc mb-6">
          <textarea name="address" id="" cols="30" rows="10" placeholder="Enter Description" class="w-full rounded bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white"></textarea>
        </div>
        {{-- button clear --}}
        <div class="input-clear">
          <button type="reset" class="btn-clear bg-[#FF3E9A]/50 border-4 border-[#FF3E9A] w-full py-4 flex justify-center rounded cursor-pointer">Clear</button>
        </div>
      </div>
    </div>
    {{-- button submit --}}
    <div class="submit-button">
        <button type="submit" class="btn-clear bg-[#3ACBD4]/50 border-4 border-[#3ACBD4] w-full py-4 flex justify-center rounded cursor-pointer">Submit</button>
    </div>
  </form>



</div>
@endsection


