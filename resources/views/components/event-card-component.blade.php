@props(['title',
    'description',
    'cover',
    'start_date',
    'location',
    'price',
    'start_time',
    'end_time',
    'register_link',
    'end_register',])
    <div class="bg-gray-100 py-10 px-4 min-h-screen overflow-y-auto">
        <div class="space-y-6 flex flex-col items-center">
            @foreach ($events as $event )
                
            <div class="cardEvent w-[1200px] h-[350px] bg-white flex rounded-[25px] p-[5px] border-2 border-solid mx-auto">

                <div class="eventDetail p-[5px] w-[600px]">

                    <div class="description w-full h-[3/4]">

                        <h2 class="heading3 ">{{$event->title}}</h2>
                        <p class="smallText text-gra-300">{{$event->description}}</p>
                    </div>
                    <div class="schedule ">

                        <div class="flex ">

                            <i class="bi bi-calendar text-gray-500 mr-2"></i>
                            <span class="text-gray-700">{{$event->start_date}} <br> {{$event->sart_time}} - {{$event->end_time}} </span>
                        
                        </div>
                        
                        <div class="flex h-[1/4] w-full">
                            <i class="bi bi-geo-alt-fill text-gray-500 mr-2 inline-block"></i>
                            <span>{{$event->location}}</span>
                        </div>
                    
                    </div>
                
                </div>
                
                <div class="eventCover w-[600px] h-[300px] rounded-[20px] ">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <button class="bg-blue-600 w-[40px] h-[20px] text-center"><a href="">Edit</a></button>
                        @endif
                    @endauth
                    <a href="{{ route('events.detail', ['id' => $event->id]) }}"> 
                        <img src="{{asset('storage/images/coverevent.jpg')}}" class="w-full h-full object-cover rounded-[20px]" alt="none">
                    </a>
                </div>
            
            </div>
            @endforeach
            
        </div>
    </div>
