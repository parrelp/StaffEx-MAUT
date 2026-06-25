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
    <h1 class="type text-[32px] text-white/90 font-semibold">Edit Candidate</h1>
  </div>
  
  <div class="divider"></div>

  <form action="{{ route('admin.departments-data.update-candidate-department', ['id' => $candidate->id_candidate, 'id_department' => $candidate->department_id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid-form mt-10 grid grid-cols-2 gap-10 mb-6">
      <div class="left-form">
        <div class="candidate-name mb-6">
          <input name="name" value="{{ old('name', $candidate->name) }}" class="w-full rounded bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50"/>
        </div>

        <div class="candidate-class mb-6">
          <input name="class" value="{{ old('class', $candidate->class) }}" class="w-full rounded bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50"/>
        </div>

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
                    <p class="text-base font-medium text-white">Drop new photo or browse</p>
                    <p class="text-sm text-slate-400">Current: {{ $candidate->photo }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="right-form">
        <div class="candidate-email mb-6">
          <input name="email" value="{{ old('email', $candidate->email) }}" class="w-full rounded bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50"/>
        </div>

        <div class="candidate-phone-number mb-6">
          <input name="phone_number" value="{{ old('phone_number', $candidate->phone_number) }}" class="w-full rounded bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50"/>
        </div>

        <div class="department-desc mb-6">
          <textarea name="description" class="w-full rounded bg-gradient-to-b from-white/20 to-white/10 border-2 border-white/50 p-4 placeholder-white/50">{{ old('description', $candidate->description) }}</textarea>
        </div>

        <div class="input-clear">
          <button type="reset" class="btn-clear bg-[#FF3E9A]/50 border-4 border-[#FF3E9A] w-full py-4 flex justify-center rounded cursor-pointer">Clear</button>
        </div>
      </div>
    </div>

    <div class="submit-button">
      <button type="submit" class="btn-clear bg-[#3ACBD4]/50 border-4 border-[#3ACBD4] w-full py-4 flex justify-center rounded cursor-pointer">Update</button>
    </div>
  </form>
</div>
@endsection
