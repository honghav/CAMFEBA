<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    {{-- <link rel="stylesheet" href="../css/Layout.css"> --}}
        {{-- @vite(['resources/css/Layout.css']) --}}
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body >
    {{-- Navvigation Bar --}}

    <nav>
        <div class="flex flex-col h-[180px] ">
            <div class="h-[120px] w-[full] ">
                <img src="{{asset('storage/images/logo-camfeba.jpg')}}" alt="null" class="h-full object-contain">
            </div>
            {{-- <div class="flex  w-full h-[60px] border border-solid border-black"> --}}
                 <ul class="flex justify-between  font-sans font-semibold text-[18px] px-4 py-2 text-[#002870] mr-[15px] ml-[15px]">
                    <li><a href="#">Home</a></li>
                    <li><a href="{{route('aboutus.index')}}">About Us</a></li>
                    <li><a href="#">Technical Assistance</a></li>
                    <li><a href="{{route('events')}}">Events</a></li>
                    <li><a href="#">Membership</a></li>
                    <li><a href="#">Project</a></li>
                    <li><a href="#">Our Advocacy</a></li>
                    <li><a href="{{route('dashboard')}}">Profile</a></li>
                </ul>
            {{-- </div> --}}
        </div>
    </nav>
    {{-- Main Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>
    <hr>
    <footer>
        <div class="footerlayout flex p-[10px] bg-gray-200">
            <div class="contect w-[400px] h-auto">
                <h3 class="smallText ">Contact Us</h3>
                <p>Address: 1234 Street Name, City, State, Zip</p>
                <p>Telephone: 023 23 0022/ 023 23 0023</p>
            </div>
            <div class="imformation w-[400px] h-auto">
                <p class="smallText text-gray-800">Information</p>
                <p class="smallText text-gray-500">Our Immediate Suport</p>
                <p class="smallText text-gray-400">Legal Inquires</p >
                <p class="smallText text-gray-400">Email: Legal@camfeba.com</p >
                <p class="smallText text-gray-400">Phone: + 855(12) 299 531 | +855 12 634 045</p >
                <p class="smallText text-gray-400">Member Inquires</p>
                <p class="smallText text-gray-400">Email: Membership@camfeba.com</p >
                <p class="smallText text-gray-400">Phone: +855 12 634 055</p >
                    
            </div>
            <div class="subscribe w-[600px] h-auto">
                <form action="" class="w-full max-w-lg bg-white p-8 rounded shadow-md">
                    <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Enter your name</label>
                    <input type="text" name="name" id="name" placeholder="Your name" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="you@example.com" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                    <label for="company" class="block text-gray-700 font-semibold mb-2">Enter your Company</label>
                    <input type="text" name="company" id="company" placeholder="Company name" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                    <label for="message" class="block text-gray-700 font-semibold mb-2">Enter your Service (Service you want):</label>
                    <!-- Using textarea instead of a non-standard "text-area" -->
                    <textarea name="message" id="message" placeholder="Describe your service" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" rows="4"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition-colors">
                    Subscribe
                    </button>
                </form>
            </div>
        </div>
    </footer>
</body>
</html>