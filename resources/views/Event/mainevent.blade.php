
@extends('Layout.Header')
@section('content')

<div>    {{-- Search filter --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

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
    <button><a href="{{route('dashboard')}}">go to dashbord</a></button>
    {{-- @auth
        @if(auth()->user()->isAdmin())
            <button class="bg-blue-600 w-[205px] h-[35px] text-center"><a href="{{route('events.create')}}">Create News Event</a></button>
        @endif
    @endauth --}}
    <div class="bg-gray-100 py-10 px-4 min-h-screen overflow-x-auto">
        <div class="space-y-6 flex flex-col items-center">
           @foreach ($events as $event)
          
          {{-- {{dd($event);}}  --}}
    <x-event-card
        :id="$event->id"
        :title="$event->title"
        :description="$event->description"
        :cover="$event->cover"
        :start_date="$event->start_date"
        :location="$event->location"
        :price="$event->price"
        :start_time="$event->start_time"
        :end_time="$event->end_time"
        :end_register="$event->end_register"
    />
@endforeach


            
        </div>
    </div>

</div>
@auth
        @if(auth()->user()->isAdmin())
        <div class="">
            <form method="POST" action="{{route('events.store')}}">
                        @csrf
                        <label>Title:</label>
                        <input type="text" name="title" required><br>
                
                        <label>Description:</label>
                        <textarea name="description" required></textarea><br>
                
                        <label>Cover (image URL or path):</label>
                        <input type="text" name="cover"><br>
                        
                        <label>Start Date:</label>
                        <input type="date" name="start_date" required><br>
                        
                        <label>Location:</label>
                        <input type="text" name="location"><br>
                
                        <label>Price:</label>
                        <input type="number" name="price" step="0.01"><br>
                
                        <label>Start Time:</label>
                        <input type="time" name="start_time"><br>
                
                        <label>End Time:</label>
                        <input type="time" name="end_time"><br>
                
                        <label>Register Link:</label>
                        <input type="url" name="register_link" required><br>
                
                        <label>End Registration Date:</label>
                        <input type="date" name="end_register"><br>
                
                        <x-primary-button>
                            Submit
                        </x-primary-button>
            </form>
        </div>
        @endif
    @endauth

@endsection
