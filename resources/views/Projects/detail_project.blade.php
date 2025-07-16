@extends('Layout.Header')
@section('content')
<div>
    <img 
           src="{{ $projectById->cover ? asset($projectById->cover) : asset('storage/images/coverService.jpg') }}"
            alt="{{ $projectById->title }}"
            class="w-full h-[600px] object-cover"
            onerror="this.onerror=null;this.src='{{ asset('storage/images/coverService.jpg') }}'"
            >
            <h1 class="text-[36px] text-center font-sans font-bold text-[#002870]">{{$projectById->title}}</h1>
    <div class="mt-[50px] font-sans">
    {!! $projectById->content !!}
    </div>
</div>
<
@endsection