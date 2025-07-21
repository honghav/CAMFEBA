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

<x-bladewind::table
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
</x-bladewind::table>

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