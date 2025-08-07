@extends('Layout.Header')
@section('content')
<div>
    {{-- Cover Page Select from Layouut--}}
    <div class="w-full h-[500px] mb-20px">
        <img class="d-block h-full w-full" 
                    src="{{ $bg->file_path ? asset('storage/' . $bg->file_path) : asset('storage/images/coverService.jpg') }}"
                    alt="{{ $bg->name }}"
                    onerror="this.onerror=null;this.src='{{ asset('storage/images/coverService.jpg') }}'"
                    >
    </div>
    <h1 class="text-[48px] text-center font-sans text-[#002870] font-bold m-[30px]">{{$bg->name}}</h1>
    <p class="text-[16px] font-sans">{{$bg->description}}</p>
    
    {{-- Body page --}}
    <div class="flex flex-col items-center">
        <h1 class="text-[48px] text-center font-sans text-[#002870] font-bold m-[30px] ">Organization Sturcture Diagram</h1>
        {{-- President card --}}
        <div class="w-[220px] h-[185px] flex flex-col items-center">
                {{-- More fixing on image size  --}}
            <img class="h-[125px] w-[125px] object-cover rounded-full" 
                src="{{ $president->file_path ? asset('storage/' . $president->file_path) : asset('storage/images/coverService.jpg') }}"
                alt="{{ $president->name }}"
               onerror="this.onerror=null;this.src='{{ asset('storage/images/coverService.jpg') }}'">
            <h1 class="text-[28px] text-center font-sans text-[#002870] font-bold ">{{$president->name}}</h1>
            <p class="text-gray-400 text-[16px] text-center">{{$president->role}}</p>
        </div>
        {{-- anather bord --}}
        <div class="mt-8">
            <div class="space-y-12 flex ">
                @foreach ($memberbord as $bord )
                {{-- Fixing ot row and column --}}
                    <div class="flex flex-col items-center bg-[#ffffff] rounded-lg shadow w-[100px] h-[164px] m-4">
                        <img class="d-block h-[100px] w-[100px]" 
                            src="{{ $bord->file_path ? asset('storage/' . $bord->file_path) : asset('storage/images/coverService.jpg') }}"
                            alt="{{ $bord->name }}"
                            onerror="this.onerror=null;this.src='{{ asset('storage/images/coverService.jpg') }}'">
                        <h1 class="text-[18px] text-center font-sans text-[#002870] font-semibold">{{$bord->name}}</h1>
                        <p class="text-gray-400 text-[14px] text-center ">{{$bord->role}}</p>
                    </div>
                @endforeach
               

              

            </div>
        </div>
    </div>



@endsection
