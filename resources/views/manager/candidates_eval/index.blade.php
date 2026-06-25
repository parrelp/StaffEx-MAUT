@extends('layouts.manager.app')


@section('content')
  <div class="container m-auto w-full mt-10">
      <div data-dui-stepper-container data-dui-initial-step="1" class="w-full">
        <div class="flex w-full items-center justify-between">
          <div aria-disabled="false" data-dui-step class="group w-full flex items-center">
            <div class="relative">
              <span class="relative grid h-10 w-10 place-items-center rounded-full bg-stone-200 group-data-[active=true]:bg-[#3178C8] group-data-[active=true]:outline-2 group-data-[active=true]:text-white group-data-[completed=true]:bg-[#3178C8] group-data-[completed=true]:outline-2 group-data-[completed=true]:text-white mb-2">
                <p class="font-medium">1</p>
              </span>
              <span class="absolute -bottom-6 start-0 whitespace-nowrap text-lg text-white">Data Diri</span>
            </div>
            <div class="flex-1 h-1 bg-stone-200 group-data-[completed=true]:outline-1 group-data-[completed=true]:outline-white group-data-[completed=true]:bg-[#3178C8] mb-2"></div>
          </div>
          <div aria-disabled="true" data-dui-step class="group w-full flex items-center">
            <div class="relative">
              <span class="relative grid h-10 w-10 place-items-center rounded-full bg-stone-200 group-data-[active=true]:bg-[#3178C8] group-data-[active=true]:outline-2 group-data-[active=true]:text-white group-data-[completed=true]:bg-[#3178C8] group-data-[completed=true]:outline-2 group-data-[completed=true]:text-white mb-2">
                <p class="font-medium">2</p>
              </span>
              <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 whitespace-nowrap text-lg text-white">Penilaian</span>
            </div>
            <div class="flex-1 h-1 bg-stone-200 group-data-[completed=true]:outline-1 group-data-[completed=true]:outline-white group-data-[completed=true]:bg-[#3178C8] mb-2"></div>
          </div>
          <div aria-disabled="true" data-dui-step class="group flex items-center">
            <div class="relative">
              <span class="relative grid h-10 w-10 place-items-center rounded-full bg-stone-200 group-data-[active=true]:bg-[#3178C8] group-data-[active=true]:outline-2 group-data-[active=true]:text-white group-data-[completed=true]:bg-[#3178C8] group-data-[completed=true]:text-white mb-2">
                <p class="font-medium">3</p>
              </span>
              <span class="absolute -bottom-6 end-0 whitespace-nowrap text-lg text-white">ringkasan</span>
            </div>
          </div>
        </div>

        <div class="mt-12">
          {{-- candidate information --}}
          <div data-dui-step-content="1" class="candidate-info step-content hidden">
            <div class="card-info flex border-[8px] border-white rounded-[16px] overflow-hidden relative h-[41.85rem] p-8">
              <div class="wrapper grid grid-cols-7 gap-12 w-full">
                <div class="left col-span-3">
                  <div class="candidate-img flex justify-center bottom-0 h-full">
                    <img src="{{ asset('storage/images/user.png') }}" alt="" class="">
                  </div>

                </div>
                <div class="right col-span-4 flex flex-col justify-center">
                  <div class="candidate-name font-bold text-white mb-6">
                      <h1 class="text-[76px] font-bold leading-[70px]">
                          {{ Str::upper(Str::headline(explode(' ', $candidate->name)[0])) }}
                      </h1>
                      <h2 class="text-[36px] font-bold leading-[40px] stroke-white" style="-webkit-text-stroke: 1px white; color: transparent;">
                          {{ Str::upper(Str::headline(Str::after($candidate->name, ' '))) }}
                      </h2>
                  </div>
                  <div class="border-b border-white opacity-50 my-4"></div>

                  <div class="candidate-details flex flex-col gap-4">
                    <div class="candidate-class flex gap-2 items-center">
                      <div class="label font-semibold text-white text-xl">Kelas</div>
                      <div class="text-white">:</div>
                      <div class="value text-white">{{ $candidate->class }}</div>
                    </div>
                    <div class="candidate-email flex gap-2 items-center">
                      <div class="label font-semibold text-white text-xl">Email</div>
                      <div class="text-white">:</div>
                      <div class="value text-white">{{ $candidate->email }}</div>
                    </div>
                    <div class="candidate-phone flex gap-2 items-center">
                      <div class="label font-semibold text-white text-xl">No Hp</div>
                      <div class="text-white">:</div>
                      <div class="value text-white">{{ $candidate->phone_number }}</div>
                    </div>
                    <div class="candidate-status flex gap-2 items-center">
                      <div class="label font-semibold text-white text-xl">Status</div>
                      <div class="text-white">:</div>
                      <div class="value font-semibold {{ $candidate->status === 'sudah_dinilai' ? 'text-green-400' : ($candidate->status === 'sedang_dinilai' ? 'text-yellow-400' : 'text-red-400') }}">{{ ucwords(str_replace('_', ' ', $candidate->status)) }}</div>
                    </div>
                    <div class="candidate-address flex gap-2 items-center">
                      <div class="label font-semibold text-white text-xl">Alamat</div>
                      <div class="text-white">:</div>
                      <div class="value text-white">jl.Beji</div>
                    </div>
                    <div class="candidate-document mt-4">
                      <div class="label font-semibold text-white text-xl mb-2">Dokumen :</div>
                      <div class="download-document bg-gradient-to-b from-white/20 to-white/10 px-4 py-2 cursor-pointer flex gap-4 items-center justify-between border-2 border-white rounded-xl">
                        <div class="flex gap-4 items-center">
                          <i class="ti ti-folder-open text-white text-4xl"></i>
                          <p class="text-white text-lg font-semibold">Formulir Pendaftaran</p>
                        </div>
                        <div class="">
                          <i class="ti ti-download text-white text-2xl"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- candidate eval --}}
          <form action="{{ route('evaluations.store', $candidate->id_candidate) }}" method="POST">
          @csrf
            <div data-dui-step-content="2" class="candidate-eval step-content">
              <div class="divider-eval"></div>
              <div class="guide-scroll w-full flex gap-4 justify-center items-center bg-gradient-to-r from-black/2 via-black/15 to-black/5 py-2">
                <i class="ti ti-arrow-down text-white font-semibold"></i>
                <h1 class="text-white">Scroll untuk menilai semua kriteria</h1>
                <i class="ti ti-arrow-up text-white font-semibold"></i>
              </div>
              <div class="divider-eval mb-4"></div>
              <div class="criteria-wrapper overflow-y-scroll no-scrollbar relative h-[33rem] px-4">
                {{-- CRITERIA LIST --}}
                @foreach($criteria as $item)
                <div class="criteria-title text-white font-reguler text-lg mb-4 mt-4">{{ $item->name }}</div>
                <div class="choice-of-values w-full flex justify-between gap-12 mb-8">
                  @for($i=1; $i<=4; $i++)
                  <label class="w-full cursor-pointer">
                    <input type="radio" name="scores[{{ $item->id_criteria }}]" value="{{ $i }}" class="hidden peer" @if(isset($existingEvaluations[$item->id_criteria]) && $existingEvaluations[$item->id_criteria] == $i) checked @endif>
                    <div class="choice w-full py-12 flex flex-col justify-center items-center outline-4 rounded outline-white 
                                bg-gradient-to-b from-white/20 to-white/10
                                peer-checked:bg-gradient-to-b 
                                peer-checked:from-[#1B2A62] 
                                peer-checked:to-[#1873CC]
                                peer-checked:drop-shadow-[0_0_10px_rgba(255,255,255,1)]
                                peer-checked:outline 
                                peer-checked:outline-white 
                                peer-checked:outline-[6px]">
                        @switch($i)
                            @case(1)
                                <i class="ti ti-mood-sad-2 text-white text-5xl"></i>
                                <p class="text-white text-2xl font-medium">Kurang</p>
                                @break
                            @case(2)
                                <i class="ti ti-mood-smile text-white text-5xl"></i>
                                <p class="text-white text-2xl font-medium">Cukup</p>
                                @break
                            @case(3)
                                <i class="ti ti-mood-smile-beam text-white text-5xl"></i>
                                <p class="text-white text-2xl font-medium">Baik</p>
                                @break
                            @case(4)
                                <i class="ti ti-mood-wink-2 text-white text-5xl"></i>
                                <p class="text-white text-2xl font-medium">Sangat Baik</p>
                                @break
                        @endswitch
                    </div>
                  </label>
                  @endfor
                </div>
                @endforeach
              </div>
              {{-- <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded mt-4">Simpan Penilaian</button> --}}


              <button type="submit" class="bg-gradient-to-b from-white/20 to-white/10 border-2 border-white text-white px-6 py-3 rounded mt-4 w-full font-semibold cursor-pointer">Simpan Penilaian</button>
            </div>
          </form>
          <div data-dui-step-content="3" class="eval-summary step-content hidden">
            <div class="card-summary flex border-[8px] border-white rounded-[16px] overflow-hidden relative h-[41.85rem] p-8">
              <div class="wrapper grid grid-cols-6 gap-12 w-full">
                <div class="left col-span-4">
                  <div class="candidate-name font-bold text-white text-3xl mb-8">Ringkasan Penilaian</div>
                  <div class="candidate-eval-summary">
                  @foreach ($criteria as $item)
                    @php
                      $score = $existingEvaluations[$item->id_criteria] ?? null;
                      $maxScore = 4;
                      $percentage = $score ? ($score / $maxScore) * 100 : 0;
                    @endphp
                    <div class="criteria mb-4">
                      <div class="wrap-title-score flex justify-between w-full">
                        <p class="font-reguler mb-2 text-white text-lg">{{ $item->name }}</p>
                        <p class="font-reguler mb-2 text-white text-lg font-semibold">{{ $score ?? '-' }} / {{ $maxScore }}</p>
                      </div>
                      <div class="w-full h-4 border-2 border-white rounded-full overflow-hidden mb-2">
                        <div class="h-full bg-[#64AAFF]" style="width: {{ $percentage }}%"></div>
                      </div>
                    </div>
                  @endforeach

                  </div>
                </div>
                <div class="right col-span-2">
                  <div class="candidate-profile">
                    <img src="{{ asset('storage/images/user.png') }}" alt="" class="">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-6 flex w-full justify-between gap-4"> 
          <button 
            data-dui-stepper-prev 
            class="inline-flex items-center justify-center border-2 border-white align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed px-10 py-2 rounded text-white cursor-pointer">
            Previous
          </button>
          <button 
            data-dui-stepper-next 
            class="inline-flex items-center justify-center border-2 border-white align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none px-10 py-2 rounded text-white cursor-pointer">
            Next
          </button>

        </div>
      </div>

  </div>
@endsection
