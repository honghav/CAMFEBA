@extends('Layout.Header')
@section('content')
<div class="flex flex-col">
    <div class=" banner flex justify-center items-center  w-full h-[420px] bg-blue-800">
        <div class="coverevent w-[600px] h-[350px]">
            <img src="{{asset('storage/images/coverevent.jpg')}}" class="w-full h-full object-cover rounded-[20px]" alt="none">
        </div>
    </div>

    <div class="mianEvent">
        <h1 class="heading1 text-center">{{$event->title}}</h1>
        <p class="bodyText text-gray-500 pl-[30px]">{{$event->description}}</p>
        <div class="schedule bodyText mt-[30px] pl-[30px] ">
            <div class="flex ">
                <i class="bi bi-calendar text-gray-500 mr-2"></i>
                <span class="text-gray-700">{{$event->start_date}}<br>{{$event->sart_time}} - {{$event->end_time}} </span>
            </div>
            <div class="flex h-[1/4] w-full">
                <i class="bi bi-geo-alt-fill text-gray-500 mr-2 inline-block"></i>
                <span>{{$event->lacation}}</span>
            </div>         
        </div>
        <div class="">        
        <button class="w-[150px] h-[45px] bg-blue-400 rounded-[10px] ml-[50px] mt-[40px] mb-[30px]"><i class="bi bi-geo-alt-fill text-white mr-2 inline-block"><a href="{{$event->register_link}}">Register Here</a></i></button>  
        </div>
    </div>
    <div class="listSpeacker overflow-x-auto whitespace-nowrap px-4 py-6">
        <div class="inline-flex gap-4">
            <div class="SpeakerCard w-[270px] h-[370px] rounded-[15px] bg-amber-100 p-[25px]">
                <img src="{{asset('storage/images/Speaker.jpg')}}" class="w-[250px] h-[250px]" alt="null">
                <div class="speackerDetail">
                    <h4>Name:Kim Jong Un</h4>
                    <h5>From: North Korea</h5>
                    <h5>Role:President</h5>
                </div>
            </div>
        </div>
</div>


</div>
@endsection