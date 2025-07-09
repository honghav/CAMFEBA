@extends('Layout.Header')
@section('content')
<div>    {{-- Search filter --}}

    <div class="filterEvent flex justify-center items-center gap-4 p-4  rounded-md">
        <form action="" class="flex flex-col sm:flex-row items-center gap-4">
            <!-- Search Input -->
            <input type="text" name="search" placeholder="Search event..."
                class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">

            <!-- Date Picker -->
            <input type="date" name="calendar"
                class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">

            <!-- Submit Button -->
            <button type="submit"
                class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition">
                Filter Past Events
            </button>
        </form>
    </div>

{{-- Tittle --}}

    <h1 class="heading1 text-center">Event</h1>
    
    <div class="bg-gray-100 py-10 px-4 min-h-screen overflow-y-auto">
        <div class="space-y-6 flex flex-col items-center">
            @foreach ($events as $event )
                
            <div class="cardEvent w-[1200px] h-[350px] bg-white flex rounded-[25px] p-[25px] border-2 border-solid mx-auto">

                <div class="eventDetail p-[30px] w-[600]">

                    <div class="description w-full h-[3/4]">

                        <h2 class="heading3">{{$event->title}}</h2>
                        <p class="smallText text-gra-300">{{$event->description}}</p>
                    </div>
                    <div class="schedule ">

                        <div class="flex ">

                            <i class="bi bi-calendar text-gray-500 mr-2"></i>
                            <span class="text-gray-700">{{$event->start_date}} <br> {{$event->sart_time}} - {{$event->end_time}} </span>
                        
                        </div>
                        
                        <div class="flex h-[1/4] w-full">
                            <i class="bi bi-geo-alt-fill text-gray-500 mr-2 inline-block"></i>
                            <span>{{$event->lacation}}</span>
                        </div>
                    
                    </div>
                
                </div>
                
                <div class="eventCover w-[600] h-[300] rounded-[20px] overflow-hidden">
                   <a href="{{route('eventdetail')}}">
                   <img src="{{asset('storage/images/coverevent.jpg')}}" class="w-full h-full object-cover rounded-[20px]" alt="none">
                    </a>
                </div>
            
            </div>
            @endforeach
            
        </div>
    </div>

</div>
@endsection
