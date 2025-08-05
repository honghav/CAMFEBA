@extends('Layout.Header')
@section('content')

<div class="bg-gray-200 flex flex-col items-center">
    {{-- Header Image --}}
    {{-- Slide Show --}}
    <div class="h-[500px] w-[full] ">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner bg-gray-200 " >
                <div class="carousel-item active">
                <img class="d-block h-[500px] w-full" src=" {{asset('storage/images/coverService.jpg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block h-[500px] w-full" src="/images/slide2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block h-[500px] w-full" src="/images/slide3.jpg" alt="Third slide">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    {{-- Who We Are Path --}}
    <div>
        {{-- title path --}}
        <h1 class="text-[48px] text-center font-sans text-[#002870] font-bold m-[10px]">Who We Are</h1>
        {{-- body path --}}
        <div class="w-full h-[242px] bg-gray-200 justify-center items-center flex ">
            <div class="w-[1350px] h-[242px] bg-[#ffff] justify-center items-center rounded-xl shadow-xl flex flex-col">
                <p class="w-[1200px] h-[128px] font-sans font-semibold">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut ipsum esse reprehenderit repellat libero debitis sequi similique aperiam a molestias dolores molestiae odit possimus amet, officiis placeat reiciendis nemo quaerat.</p>
                <x-bladewind::button class="bg-[#002870]">Read more</x-bladewind::button>
            </div>
        </div>
    </div>
    {{-- New letter Service --}}
    <div class="">
        {{-- title path --}}
        <h1 class="text-[48px] text-center font-sans text-[#002870] font-bold m-[10px]">NewsLetter</h1>
        {{-- Body path --}}
        <div class="w-[1350px] h-[600px] flex flex-col items-center justify-between bg-[#ffffff] rounded-lg">
            <div class="w-[1278px] h-[513px] flex overflow-x-auto">
                {{-- card of news letter --}}
                <div class="w-[350px] h-[475px] rounded-md flex flex-col items-center p-[5px] m-[10px] bg-gray-300">
                    <img class="d-block h-[220px] w-[350px] rounded-lg" src=" {{asset('storage/images/coverService.jpg')}}" alt="New Letter">
                    <h3 class="font-sans font-bold text-[28px] text-[#002870]">Candid Stand for camfeba bored</h3>
                    <div style="width: 330px; height: 150px; overflow: auto;">
                        <p class="fnot-sans text-[16px]">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid reiciendis, veniam architecto blanditiis fugit perspiciatis minus maiores doloremque perferendis, nulla obcaecati natus! Eaque consectetur magni aspernatur dolore, voluptas ipsam quibusdam!</p>
                    </div>
                    <div class=" w-[323px] h-[80px] flex justify-end items-end">
                        <p class="font-sans text-[16px] text-[#c1c1c1] ml-[60px]"> Relese date: 05-jun-2025</p>
                    </div>
                </div>
            </div>
            {{-- Button go to page news letter --}}
            <div class="mb-[20px]">
                <x-bladewind::button class="bg-[#002870]">See more</x-bladewind::button>
            </div>
        </div>
    </div>
    {{-- Path of member Say about Us --}}
    <div class="">
        {{-- title path --}}
        <h1 class="text-[48px] text-center font-sans text-[#002870] font-bold m-[10px]">What Member Say About Us?</h1>
        {{-- body path --}}
        <div class="w-[1350px] h-[600px] bg-[#ffff] justify-center items-center rounded-xl shadow-xl flex flex-col">
            <div class="grid grid-cols-2 grid-rows-2 gap-4">
                {{-- Card Qouter --}}
                <div class="bg-[#ffffff] w-[650px] h-[250px] rounded-xl content-center shadow-xl">
                    <div class="flex content-center ml-[5px]">
                        <div class="">
                            <img class="d-block h-[220px] w-[220px] rounded-lg" src=" {{asset('storage/images/coverService.jpg')}}" alt="Qoutation">
                        </div>
                        <div class="font-sans ml-[10px] w-[400px] ">
                            <h1 class="font-bold text-[28px] text-[#002870]">Mr.Sar Kinal</h1>
                            <p class="text-[18px] mb-[5px]">Managing Director Of Aplus Consalting</p>
                            <div style="width: 400px; height: 150px; overflow: auto;" class="text-[#002870] text-[18px]">
                                <p>"<br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus mollitia ut nobis totam, culpa soluta. Magnam, praesentium ipsam sint minus doloribus tenetur eligendi tempora quos quasi animi maiores quam dolor?<br>"</p>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <div class="bg-[#ffffff] w-[650px] h-[250px] rounded-xl content-center shadow-xl">
                    <div class="flex content-center ml-[5px]">
                        <div class="">
                            <img class="d-block h-[220px] w-[220px] rounded-lg" src=" {{asset('storage/images/coverService.jpg')}}" alt="Qoutation">
                        </div>
                        <div class="font-sans ml-[10px] w-[400px] ">
                            <h1 class="font-bold text-[28px] text-[#002870]">Mr.Sar Kinal</h1>
                            <p class="text-[18px] mb-[5px]">Managing Director Of Aplus Consalting</p>
                            <div style="width: 400px; height: 150px; overflow: auto;" class="text-[#002870] text-[18px]">
                                <p>"<br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus mollitia ut nobis totam, culpa soluta. Magnam, praesentium ipsam sint minus doloribus tenetur eligendi tempora quos quasi animi maiores quam dolor?<br>"</p>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <div class="bg-[#ffffff] w-[650px] h-[250px] rounded-xl content-center shadow-xl">
                    <div class="flex content-center ml-[5px]">
                        <div class="">
                            <img class="d-block h-[220px] w-[220px] rounded-lg" src=" {{asset('storage/images/coverService.jpg')}}" alt="Qoutation">
                        </div>
                        <div class="font-sans ml-[10px] w-[400px] ">
                            <h1 class="font-bold text-[28px] text-[#002870]">Mr.Sar Kinal</h1>
                            <p class="text-[18px] mb-[5px]">Managing Director Of Aplus Consalting</p>
                            <div style="width: 400px; height: 150px; overflow: auto;" class="text-[#002870] text-[18px]">
                                <p>"<br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus mollitia ut nobis totam, culpa soluta. Magnam, praesentium ipsam sint minus doloribus tenetur eligendi tempora quos quasi animi maiores quam dolor?<br>"</p>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <div class="bg-[#ffffff] w-[650px] h-[250px] rounded-xl content-center shadow-xl">
                    <div class="flex content-center ml-[5px]">
                        <div class="">
                            <img class="d-block h-[220px] w-[220px] rounded-lg" src=" {{asset('storage/images/coverService.jpg')}}" alt="Qoutation">
                        </div>
                        <div class="font-sans ml-[10px] w-[400px] ">
                            <h1 class="font-bold text-[28px] text-[#002870]">Mr.Sar Kinal</h1>
                            <p class="text-[18px] mb-[5px]">Managing Director Of Aplus Consalting</p>
                            <div style="width: 400px; height: 150px; overflow: auto;" class="text-[#002870] text-[18px]">
                                <p>"<br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus mollitia ut nobis totam, culpa soluta. Magnam, praesentium ipsam sint minus doloribus tenetur eligendi tempora quos quasi animi maiores quam dolor?<br>"</p>
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- Path of Event --}}
    <div class="">
        {{-- title path --}}
        <h1 class="text-[48px] text-center font-sans text-[#002870] font-bold m-[10px]">Events</h1>
        {{-- Body path --}}
        <div class="w-[1350px] h-[770px] bg-[#ffffff] rounded-md p-4 flex items-center justify-center">
            <div class="w-[1270px] h-[713px] flex overflow-x-auto gap-4">
                {{-- card of event --}}
                <div class="relative w-3/5 h-full rounded-lg overflow-hidden bg-cover bg-center shadow-lg" style="background-image: url('{{ asset('storage/images/coverService.jpg') }}');">
                    <div class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white/80 px-6 py-4 w-[430px] h-[250px] flex flex-col justify-buttom">
                        <h2 class="text-[#002870] text-2xl font-bold mb-4">Your Title Here</h2>
                        <p class="text-[16px]">24-jul-2025</p>
                    </div>
                </div>
                {{-- list Of events --}}
                <div class="h-full w-2/5 flex flex-col p-4  rounded-lg bg-gradient-to-r from-primaryBlue to-primaryRed">
                    <h2 class="font-sans text-[36px] text-center font-bold text-white ">Upcoming And Past Events</h2>
                    {{-- detail list --}}
                    <div class=" border-b-4 mt-[25px]" >
                        <h3 class="font-sans font-semibold text-white text-[24px]">Title Evetns</h3>
                        <p class="font-sans text-gray-300 text-[16px]">Date</p>
                    </div>
                    <div class=" border-b-4 mt-[25px]" >
                        <h3 class="font-sans font-semibold text-white text-[24px]">Title Evetns</h3>
                        <p class="font-sans text-gray-300 text-[16px]">Date</p>
                    </div>
                    <div class=" border-b-4 mt-[25px]" >
                        <h3 class="font-sans font-semibold text-white text-[24px]">Title Evetns</h3>
                        <p class="font-sans text-gray-300 text-[16px]">Date</p>
                    </div>
                    <div class=" border-b-4 mt-[25px]" >
                        <h3 class="font-sans font-semibold text-white text-[24px]">Title Evetns</h3>
                        <p class="font-sans text-gray-300 text-[16px]">Date</p>
                    </div>
                    
                    <div class="mt-5 justify-cente ">
                        <x-bladewind::button class="bg-[#002870]">See more Events</x-bladewind::button>
                    </div>
                </div>

            </div>
           

        </div>
    </div>


</div>
@endsection