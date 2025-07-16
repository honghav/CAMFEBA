@props([
    'id',
    'title',
    'cover',
])
<div>
    <div class="h-[350px] w-[250px] mr-[20px] rounded-[10px] bg-gray-200 flex flex-col items-center text-center">
    <div class="w-[184px] h-[198px] mt-[5px] justify-center ">
        <a href="{{ route('project.show', $id) }}" class="block w-full h-full">
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
    <div class="flex justify-between">
        {{ $slot }}
    </div>
</div>
</div>