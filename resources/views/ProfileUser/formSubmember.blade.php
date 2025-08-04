@extends('Layout.Header')

@section('content')
<div>
    <h1>{{ $currentUser->name }}</h1>
    <h2>Create form</h2>

    <form action="{{ route('profile.submembers.store') }}" method="POST">
        @csrf

        <x-bladewind::input 
            label="Name" 
            name="name" 
            placeholder="Enter name" 
            value="{{ old('name') }}" 
            required="true" 
        />

        <x-bladewind::input 
            label="Email" 
            name="email" 
            type="email" 
            placeholder="Enter email" 
            value="{{ old('email') }}" 
            required="true" 
        />

        <x-bladewind::input 
            label="Phone" 
            name="phone" 
            placeholder="Enter phone number" 
            value="{{ old('phone') }}" 
        />

        <x-bladewind::input 
            label="Password" 
            name="password" 
            type="password" 
            placeholder="Enter password" 
        />

        <x-bladewind::input 
            label="Image URL" 
            name="image" 
            placeholder="Enter image URL or filename" 
            value="{{ old('image') }}" 
        />

        <x-bladewind::input 
            label="Is Active" 
            name="is_active"
            value="1"
           />
        <x-bladewind::input 
            label="User ID" 
            name="user_id" 
            placeholder="Enter user ID" 
            value="{{ $currentUser->id }}" 
            required="true" 
        />
        <button type="submit">Submit</button>
        {{-- <x-bladewind::button type="button">Submit</x-bladewind::button> --}}
    </form>
</div>
@endsection
