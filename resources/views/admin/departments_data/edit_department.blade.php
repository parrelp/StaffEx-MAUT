@extends('layouts.admin.app')

@section('content')
@if ($errors->any())
  <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
    <ul class="list-disc list-inside">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="container ms-30">
  <div class="title mt-10 flex flex-col gap-2">
    <h1 class="type text-[32px] text-white/90 font-semibold">Edit Department or Biro</h1>
  </div>
  
  <div class="divider"></div>

  {{-- form --}}
  <form action="{{ route('admin.departments-data.update-department', $department->id_department) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="grid-form mt-10 grid grid-cols-2 gap-10 mb-6">
        <div class="left-form">
          <div class="add-image h-full">
            <div class="upload-box mb-4">
              <div class="group/dropzone">
                <div
                  class="relative rounded-xl border-2 border-dashed border-slate-700 bg-slate-900/50 p-8 transition-colors group-hover/dropzone:border-cyan-500/50"
                >
                  <input
                    type="file"
                    name="department_photo"
                    class="absolute inset-0 z-50 h-full w-full cursor-pointer opacity-0"
                    multiple=""
                  />
                  <div class="space-y-6 text-center">
                    <div
                      class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-slate-900"
                    >
                      <svg
                        class="h-10 w-10 text-cyan-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        ></path>
                      </svg>
                    </div>
      
                    <div class="space-y-2">
                      <p class="text-base font-medium text-white">
                        Drop your files here or browse
                      </p>
                      <p class="text-sm text-slate-400">
                        Support files: PDF, DOC, DOCX, JPG, PNG
                      </p>
                      <p class="text-xs text-slate-400">Max file size: 10MB</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="upload-complete">
              <div class="rounded-xl bg-slate-900/50 p-4">
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-3">
                    <div class="rounded-lg bg-emerald-500/10 p-2">
                      <svg
                        class="h-6 w-6 text-emerald-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                        ></path>
                      </svg>
                    </div>
                    <div>
                      <p class="font-medium text-white">image.png</p>
                      <p class="text-xs text-slate-400">1.8 MB • PNG</p>
                    </div>
                  </div>
                  <div class="flex items-center gap-2">
                    <svg
                      class="h-5 w-5 text-emerald-500"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7"
                      ></path>
                    </svg>
                    <span class="text-sm font-medium text-emerald-500">Complete</span>
                  </div>
                </div>
              </div>
    
            </div>
    
          </div>
        </div>
        <div class="right-form">
          {{-- input name --}}
          <div class="department-name mb-6">
            <input
              class="w-full rounded bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white"
              placeholder="Enter Department name.."
              name="name"
              value="{{ old('name', $department->name) }}"
            />
          </div>
          {{-- input type --}}
          <div class="department-type mb-6">
            <select class="w-full rounded bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-[#101493] focus:border-white focus:outline-none focus:ring-2 focus:ring-white" id="gender" name="type">
              <option value="">Select Type</option>
              <option value="Departemen" {{ old('type', $department->type) == 'Departemen' ? 'selected' : '' }}>Department</option>
              <option value="Biro" {{ old('type', $department->type) == 'Biro' ? 'selected' : '' }}>Biro</option>
            </select>
    
          </div>
          {{-- input desc --}}
          <div class="department-desc mb-6">
            <textarea name="description" id="" cols="30" rows="15" placeholder="Enter Description" class="w-full rounded bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50 focus:text-white focus:border-white focus:outline-none focus:ring-2 focus:ring-white">{{ old('description', $department->description) }}</textarea>
          </div>
          {{-- button clear --}}
          {{-- <div class="input-clear">
            <button type="reset" class="btn-clear bg-[#FF3E9A]/50 border-4 border-[#FF3E9A] w-full py-4 flex justify-center rounded cursor-pointer">Clear</button>
          </div> --}}
        </div>
      </div>
      {{-- button submit --}}
      <div class="submit-button">
          <button type="submit"  class="btn-clear bg-[#3ACBD4]/50 border-4 border-[#3ACBD4] w-full py-4 flex justify-center rounded cursor-pointer">Save</button>
      </div>
  </form>


</div>
@endsection


