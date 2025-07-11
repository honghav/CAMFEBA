@props([
    'id',
    'title',
    'releaseDate',
    'category',
    'cover',
    'khmer',
    'english'
    ]
)

<div class="w-[350px] h-[500px] rounded-[10px] bg-white mt-[20px]">
    <div class="w-[350px] h-[280px] rounded-[15px]">
        <a href="{{$id}}">
            <img 
            src="{{$cover ? asset($cover) : asset('storage/images/coverService.jpg')}}" 
            alt="{{$title}}"
            class="w-full h-full object-cover"
            >
        </a>
    </div>
    <div class="ml-[10px]">
        <h1 class= "font-sans text-[24px] font-semibold">{{$title}}</h1>
        <p class="font-sans font-regular font-[16px] ">{{$category}}</p>
        <p class="font-sans font-regular font-[16px] text-gray-600">{{$releaseDate}}</p>
    </div>
    <div class="flex justify-end mr-[20px]">
        <p class="font-sans font-regular font-[16px] text-black mr-[20px] "> <a href=""> {{$khmer}}</a></p>
        <p class="font-sans font-regular font-[16px] text-black text-left "> <a href=""> {{$english}} </a></p>
    </div>
</div>