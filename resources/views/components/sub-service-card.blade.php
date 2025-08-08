@props([
    'id',
    'title',
    'releaseDate',
    'type',
    'cover',
    'khmer',
    'english'
    ]
)

<div class="w-[350px] h-[500px] rounded-lg shadow-xl bg-white mt-[20px] shadow-gray-500 m-6">
    <div class="w-[350px] h-[280px] rounded-lg">
        <a href="{{route('document.show',$id)}}">
            <img 
                src="{{ $cover ? asset('storage/' . ltrim($cover, '/')) : asset('storage/images/coverService.jpg') }}" 
                alt="{{ $title }}"
                class="w-full h-full object-cover"
            />

        </a>
    </div>
    <div class="ml-[10px]">
        <h1 class= "font-sans text-[24px] font-semibold">{{$title}}</h1>
        <p class="font-sans font-regular font-[16px] ">{{$type}}</p>
        <p class="font-sans font-regular font-[16px] text-gray-300">{{$releaseDate}}</p>
    </div>
    <div class="flex justify-end mr-[20px]">
        <p class="font-sans font-regular font-[16px] text-black mr-[20px] "> <a href=""> {{$khmer}}</a></p>
        <p class="font-sans font-regular font-[16px] text-black text-left "> <a href=""> {{$english}} </a></p>
    </div>
</div>