@props([
    'id' => null,
    'title' => 'Untitled',
    'description' => 'No description available',
    'cover' => null,
    'start_date' => 'TBA',
    'location' => 'Unknown location',
    'price' => 'Free',
    'start_time' => '-',
    'end_time' => '-',
    'end_register' => '',
])

<div class="cardEvent w-[1200px] h-[350px] bg-white flex rounded-[25px] p-[5px] border-2 border-solid mx-auto">
    {{-- Left: Event details --}}
    <div class="eventDetail pl-[25px] pt-[10px] pb-[20px] w-[600px]">
        <div class="description w-[500px] h-[250px]">
            <h2 class="font-sans text-[48px] text-[#002870] font-bold">
                {{ $id ?? 'No ID' }} {{ $title }}
            </h2>
            <p class="font-sans text-black ">
                {{ $description }}
            </p>
        </div>
        <div class="schedule space-y-2 mt-2">
            <div class="flex">
                <i class="bi bi-calendar text-gray-500 mr-2"></i>
                <span class="text-gray-700">
                    Start: {{ $start_date }}<br>
                    Time: {{ $start_time }} - {{ $end_time }}
                </span>
            </div>
            <div class="flex items-center">
                <i class="bi bi-tag-fill text-gray-500 mr-2"></i>
                <span class="text-gray-700">Price: {{ $price }}</span>
            </div>
            <div class="flex items-center">
                <i class="bi bi-geo-alt-fill text-gray-500 mr-2"></i>
                <span>{{ $location }}</span>
            </div>
        </div>
    </div>

    {{-- Right: Event cover --}}
    <div class="eventCover w-[600px] h-[340px] p-[10px] rounded-[20px] overflow-hidden">
        {{-- Version WITH link to detail page --}}
        {{-- Uncomment if your route exists and $id is passed correctly --}}
        
        <a href="{{ route('events.detail', ['id' => $id]) }}" class="block w-full h-full">
            <img 
                src="{{ $cover ? asset('storage/'.$cover) : asset('storage/images/coverService.jpg') }}"
                class="w-full h-full object-cover hover:scale-105 transition duration-300 rounded-[10px]"
                alt="Event cover image for {{ $title }}"
            />
        </a>
       

        {{-- Version WITHOUT link --}}
        {{-- <img 
            src="{{ $cover ? asset('storage/'.$cover) : asset('storage/images/coverService.jpg') }}"
            class="w-full h-full object-cover hover:scale-105 transition duration-300 rounded-[10px]"
            alt="Event cover image for {{ $title }}"
        /> --}}
    </div>
</div>
