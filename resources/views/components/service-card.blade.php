@props([
    'id',
    'title',
    'cover',
])

<div class="h-[350px] w-[250px] mr-[20px] rounded-[10px] bg-white flex flex-col items-center text-center">
    <div class="w-[184px] h-[198px] mt-[5px] justify-center">
        <a href="{{ $id }}" class="block w-full h-full">
            <img 
            src="{{ $cover ? asset($cover) : asset('storage/images/coverService.jpg') }}"
            alt="{{ $title }}"
            class="w-full h-full object-cover"
            onerror="this.onerror=null;this.src='{{ asset('storage/images/coverService.jpg') }}'"
            >
        </a>
    </div>  
    <div>
        <h1 class="font-sans text-[24px] font-semibold mt-[10px] ">{{ $id }} {{ $title }}</h1>
    </div>
</div>

{{-- <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="relative h-48 bg-gray-100">
        <img 
            src="{{ $cover ? asset($cover) : asset('storage/images/coverService.jpg') }}"
            alt="{{ $title }}"
            class="w-full h-full object-cover"
            onerror="this.onerror=null;this.src='{{ asset('storage/images/coverService.jpg') }}'"
        >
    </div>
    <div class="p-4">
        <h3 class="font-bold text-lg">{{ $title }}</h3>
        <p class="text-gray-500">Service ID: {{ $id }}</p>
    </div>
</div> --}}