@extends('Layout.Header')
@section('content')
<div class="">
    <div class="flex flex-col items-center p-8">
       <img 
        class="h-[600px] w-[600px] object-cover"
        src="{{ $layout->file_path 
            ? asset('storage/' . $layout->file_path) 
            : asset('storage/images/coverService.jpg') }}" 
        alt="{{ $layout->name }}" 
    />
    </div>
    <div class="text-start m-8 p-8">
        <h2 class="text-[36px] text-center font-sans text-[#002870] font-bold m-[30px]">{{$layout->name}}</h2>
        <p class="font-sans text-[16px] text-start">{{$layout->description}}</p>
    </div>
    <div class="flex justify-center">
        @foreach ($documents as $document )
        <x-sub-service-card
            :id="$document->id"
            :cover="$document->cover"
            :title="$document->title"
            :release-date="$document->published_at"
            :category="$document->type"
            khmer="Khmer"
            english="English"
        />
    @endforeach
    </div>
    
    {{-- <p>{{$layout}}</p> --}}
   {{-- <x-sub-service-card
    id="1"
    title="RK No.0520_20 on the Establishment of NSFF as a Public Administration Institute"
    releaseDate="2024-01-15"
    category="Programming"
    khmer="Khmer"
    english="English"
/> --}}
</div>
@endsection