<!DOCTYPE html>
<html>
<head>
    <title>Event Card Preview</title>
    @vite('resources/css/app.css') {{-- if you use Vite + Tailwind --}}
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">


<x-event-card
    id="1"
    title="Tech Conference"
    description="Annual technology conference with industry leaders"
    cover="images/events/tech-conf.jpg"
    start_date="2023-11-15"
    location="San Francisco Convention Center"
    price="$199"
    start_time="09:00"
    end_time="17:00"
    end_register="2023-11-10"

/>
</body>
</html>
