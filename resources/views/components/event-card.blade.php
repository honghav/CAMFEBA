@props([
    'id',
    'title',
    'description',
    'cover',
    'start_date',
    'location',
    'price',
    'start_time',
    'end_time',
    'end_register',])
        <div class="cardEvent w-[1200px] h-[350px] bg-white flex rounded-[25px] p-[5px] border-2 border-solid mx-auto">

                <div class="eventDetail pl-[25px] pt-[10px] pb-[20px] w-[600px]">

                    <div class="description w-[500px] h-[250px]">

                        <h2 class="font-sans text-[48px] text-[#002870] font-bold">{{$id}} {{$title}}</h2>
                        <p class="font-sans text-black ">{{$description}}</p>
                    </div>

                    <div class="schedule ">
                        <div class="flex ">
                            <i class="bi bi-calendar text-gray-500 mr-2"></i>
                            <span class="text-gray-700">Strat: {{$start_date}} <br> Time{{$start_time}} - {{$end_time}} </span>
                        </div>
                        <div class="flex items-center">
                            <i class="bi bi-tag-fill text-gray-500 mr-2"></i>
                        </div>
                        <div class="flex h-[1/4] w-full">
                            <i class="bi bi-geo-alt-fill text-gray-500 mr-2 inline-block">Location</i>
                            <span>{{$location}}</span>
                        </div>
                    
                    </div>
                
                </div>
                
                {{-- <div class="eventCover w-[600px] h-[300px] rounded-[20px] "> --}}
                   
                    {{-- <a href="{{ route('events.detail', ['id' => $id]) }}"> 
                        <img src="{{asset('storage/images/coverevent.jpg')}}" class="w-full h-full object-cover rounded-[20px]" alt="none">
                    </a> --}}
                {{-- </div> --}}

                <div class="eventCover w-[5800px] h-[340px] p-[10px] rounded-[20px] overflow-hidden">
                    {{-- <h2>{{$cover}}</h2> --}}
                    <a href="{{ $id }}" class="block w-full h-full">
                        <img 
                            src="{{asset('storage/images/coverevent.jpg')}}" 
                            class="w-full h-full object-cover hover:scale-105 transition duration-300 rounded-[10px]"
                            alt="Event cover image for {{ $title }}"
                            onerror="this.src='https://placehold.co/600x340?text=IMAGE+NOT+FOUND'"
                        />
                    </a>
                </div>
        </div>
