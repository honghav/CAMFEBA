@extends('Layout.Header')

@section('content')
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
@endsection