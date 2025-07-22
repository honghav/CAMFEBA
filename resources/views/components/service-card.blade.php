@props([
    'id',
    'title',
    'cover',
])

<div class="h-[350px] w-[250px] mr-[20px] rounded-[10px] bg-white flex flex-col items-center text-center shadow-md hover:shadow-lg transition-shadow duration-300">
    <div class="w-[184px] h-[198px] mt-[5px] justify-center">
        <a href="{{ route('document.index') }}" class="block w-full h-full">
            <img 
                src="{{ $cover ? asset('storage/' . $cover) : asset('storage/images/coverService.jpg') }}"
                alt="{{ $title }}"
                class="w-full h-full object-cover rounded-[8px]"
                onerror="this.onerror=null;this.src='{{ asset('storage/images/coverService.jpg') }}'"
            >
        </a>
    </div>  
    <div class="p-4">
        <h1 class="font-sans text-[24px] font-semibold mt-[10px] truncate">{{$id}}{{ $title }}</h1>
        
        <div class="flex justify-center space-x-2 mt-4">
            <x-bladewind::button
                size="tiny"
                color="blue"
                onclick="showModal('edit-category-{{ $id }}')"
            >
                Edit
            </x-bladewind::button>
            
            <x-bladewind::button
                size="tiny"
                color="red"
                onclick="deleteCategory('{{ $id }}')"
            >
                Delete
            </x-bladewind::button>
        </div>
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