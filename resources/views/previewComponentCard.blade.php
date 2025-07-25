{{-- <!DOCTYPE html>
<html>
<head>
    <title>Event Card Preview</title>
    @vite('resources/css/app.css') if you use Vite + Tailwind --}}
{{-- </head>
<body class="bg-gray-100 flex flex-col"> --}}

@extends('Layout.Header')
@section('content')
{{-- Preview Component Card --}}


{{-- Navbarvication --}}

<nav class="flex justify-between p-4">
    <div class="container mx-auto  items-center">
        <div class="h-[120px] w-[full] ">
                <img src="{{asset('storage/images/logo-camfeba.jpg')}}" alt="null" class="h-full object-contain">
        </div> 
        <div class="space-x-6 flex justify-between  font-sans font-semibold text-[18px] px-4 py-2 text-[#002870] mr-[15px] ml-[15px]">
            <a href="/" class="hover:text-black">Home</a>

            <div class="relative group">
                <button class="hover:text-black flex items-center">
                    Technical
                    <svg class="ml-1 h-4 w-4 fill-current" viewBox="0 0 20 20">
                        <path d="M5.5 7l4.5 4 4.5-4H5.5z"/>
                    </svg>
                </button>
                <div
                    class="absolute mt-2 w-48 bg-white rounded shadow-lg text-gray-800 z-20 opacity-0 group-hover:opacity-100 invisible group-hover:visible transition duration-200">
                    <a href="#source" class="block px-4 py-2 hover:bg-gray-100">ក. ប្រភពរឿង</a>
                    <a href="#type" class="block px-4 py-2 hover:bg-gray-100">ខ. ប្រភេទ និង ចលនា</a>
                    <a href="#context" class="block px-4 py-2 hover:bg-gray-100">ត. ការកំណត់តែង</a>
                </div>
            </div>

           <div class="relative group flex items-center">
                <a href="{{ route('project.index') }}" class="hover:text-black">
                    About Us
                </a>
                <div class="flex items-center ml-1 cursor-pointer">
                    <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                        <path d="M5.5 7l4.5 4 4.5-4H5.5z"/>
                    </svg>
                </div>

                <div class="absolute mt-6 w-60 bg-white rounded shadow-lg text-gray-800 z-20 opacity-0 group-hover:opacity-100 invisible group-hover:visible transition duration-200">
                    <!-- Events with submenu -->
                    <div class="relative submenu group">
                        <a href="{{ route('events') }}" class="flex justify-between items-center px-4 py-2 hover:bg-gray-100">
                            Events
                            <svg class="h-4 w-4 fill-current ml-1 transform group-hover:rotate-180 transition-transform" viewBox="0 0 20 20">
                                <path d="M5.5 7l4.5 4 4.5-4H5.5z"/>
                            </svg>
                        </a>
                        <div class="absolute left-full top-0 ml-1 w-56 bg-white rounded shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-200">
                            <a href="{{ route('events') }}" class="block px-4 py-2 hover:bg-gray-100">Upcoming Events</a>
                            <a href="{{ route('events') }}" class="block px-4 py-2 hover:bg-gray-100">Past Events</a>
                        </div>
                    </div>
                    
                    <a href="{{ route('project.index') }}" class="block px-4 py-2 hover:bg-gray-100">About Us</a>
                </div>
            </div>


        </div>
    

            {{-- <a href="#meaning" class="hover:text-white">៤. ទិដ្ឋភាពវិភាគអត្តន័យ</a> --}}
        </div>
    </div>
</nav>




{{-- <x-bladewind::table
    divider="thin"
    striped="true"
    hover="true"
    >
    <x-slot name="header">
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
    </x-slot>
    <tr>
        <td>John Doe</td>
        <td>john@example.com</td>
        <td>Admin</td>
    </tr>
</x-bladewind::table> --}}

{{-- <x-bladewind::button>Save User</x-bladewind::button> --}}
   {{-- Event Mian page Card  --}}
{{-- <x-event-card
    id="1"
    title="Tech Conference"
    description="Annual technology conference with industry leaders"
    cover="images/events/tech-conf.jpg"
    start_date="2023-11-15"
    location="San Francisco Convention Center"
    price="19.9"
    start_time="09:00"
    end_time="17:00"
    end_register="2023-11-10"
/> --}}

{{-- Service Mian Page Card  --}}
<hr>
{{-- <x-service-card 
    id="1"
    title="NSSF Law and Regulation"
    cover="storage/images/coverService.jpg"  
/> --}}

{{-- <x-sub-service-card
    id="1"
    title="RK No.0520_20 on the Establishment of NSFF as a Public Administration Institute"
    releaseDate="2024-01-15"
    category="Programming"
    khmer="Khmer"
    english="English"
/> --}}
{{-- </body>
</html> --}}
@endsection

{{-- Preview Component Card --}}