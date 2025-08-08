@extends('Layout.Header')
@section('content')
<div class="flex flex-col items-center p-8">
    <div class="">
       <img class="h-[600px] w-[560px]"
        src="{{ $document->cover ? asset('storage/' . ltrim($document->cover, '/')) : asset('storage/images/coverService.jpg') }}" 
        alt="{{ $document->title }}"
        class="w-full h-full object-cover"
    />
    </div>
    <div class="text-start m-8">
        <h2 class="text-[36px] text-center font-sans text-[#002870] font-bold m-[30px]">{{$document->title}}</h2>
    </div>
    <div class="flex justify-end items-end w-full">
       <a href="{{ route('documents.download', ['id' => $document->id]) }}" class="btn btn-primary">
        Download PDF
    </a>
    </div>

    <div class="text-start m-8">
        <p>{{$document->description}}</p>
    </div>
</div>
@endsection
