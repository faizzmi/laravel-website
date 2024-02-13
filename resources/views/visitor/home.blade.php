@extends('layouts.app')

@section('content')
<div class="bg-stone-200 text-center">
    <ion-icon name="alert-circle"></ion-icon>
    Seeking for Summer Internship: 04/03/2024-16/08/2024
    <ion-icon name="alert-circle"></ion-icon>
</div>
<main class="max-w-[1920px] mx-auto bg-white overflow-hidden">
    <section style="background-image: url('assets/images/w5.jpg')" class="h-[480px] xl:h-[640px] bg-gradient-to-r from-[#2E2824] to-[#12100E] bg-center lg:bg-cover bg-no-repeat bg-fixed xl:rounded-bl-[290px]">
        <div class="container mx-auto h-full flex items-center justify-center xl:justify-start">
            <div class="w-[567px] flex flex-col p-12 items-center text-center xl:text-left lg:items-start">
                <h1 class="text-white font-primary mb-8 text-[64px] lg:text-[84px] leading-none">Faiz Azmi</h1>
                <h1 class="mb-8 text-justify text-white">
                    Welcome to my portfolio! As a Junior Software Engineer, I showcase my coding, design, and collaboration skills.
                    Explore projects, view my resume, and let's connect for exciting opportunities!
                </h1>
            </div>
        </div>
    </section>

    <section class="mt-[80px] xl:mt-[200px] relative z-20">
        <div class="container mx-auto xl:px-0">
            <div class="flex lex-col xl:flex-row text-container xl:text-left justify-between items-center gap-8 xl:gap-[74px]">
                <div class="flex-1 order-2 xl:order-none max-w-xl xl:max-w-[410px] flex flex-col items-center xl:items-start gap-8">
                    <h2 class="mb-8 text-4xl font-bold">About Me</h2>
                    <p>Welcome to my portfolio! As a Junior Software Engineer, I showcase my coding, design, and collaboration skills.
                        Explore projects, view my resume, and let's connect for exciting opportunities!
                    </p>
                    <div class="flex items-center justify-center xl:justify-start gap-4">
                        <div class="bg-[#5E452A]/15 w-[93px] h-[93px] rounded-full flex justify-center items-center">
                            <ion-icon class="text-[#5E452A] text-4xl" name="call"></ion-icon>
                        </div>
                        <div class="text-left">
                            <div class="text-xl font-bold">010 3740 182</div>
                            <div>Call us anytime</div>
                        </div>
                    </div>
    
                    <button class="bg-[#5E452A] text-white px-5 py-2 rounded-full hover:bg-[#CAC6C0]">
                        Get in Touch Now
                        <ion-icon name="arrow-forward"></ion-icon>
                    </button>
                    </div>
                

                <div class="order-1 xl:order-none max-w-[250px] mx-auto xl:max-w-none xl:mx-0">
                    <img src="{{asset('assets/images/images.jpg')}}" alt="">
                </div>
            </div>
        </div>

    </section>

    <div class="h-[300px]"></div>
</main>

@endsection
