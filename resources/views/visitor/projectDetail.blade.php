@extends('layouts.app')

@section('content')
<style>
    .weird{
        writing-mode: vertical-rl;
        text-orientation: mixed;
    }

    .pixelify-sans-7401 {
        font-family: "VT323", monospace;
        font-weight: 400;
        font-style: normal;
    }

    .prevent-select {
        -webkit-user-select: none; /* Safari */
        -ms-user-select: none; /* IE 10 and IE 11 */
        user-select: none; /* Standard syntax */
    }

</style>
<?php
    $project_link = $project->linkProject;
    $project_id = $project->id;
    
    if ($project_link == ""){
        $project_link = "#";
        $target = "_self";
        $hidden = "hidden";
    } else {
        $target = "_blank";
        $hidden = "";
    }

    if ($project_id == 1){
        $hiddenA = "";
    } else {
        $hiddenA = "hidden";
    }
?>
<div class="fixed bottom-10 left-1/2 transform -translate-x-1/2 z-50">
    <div class="flex flex-col sm:flex-row sm:justify-between py-1 px-2 rounded bg-[#222222CC] items-center">
        <a href="/projects/{{ $project_id }}.html#about" class="bg-[#3e3e3e] border border-neutral-500 text-white font-semibold py-2 px-4 rounded shadow text-center mx-1 mb-2 sm:mb-0 hidden sm:inline-block">
            About
        </a>
        <a href="/projects/{{ $project_id }}.html#overview" class="bg-[#3e3e3e] border border-neutral-500 text-white font-semibold py-2 px-4 rounded shadow text-center mx-1 mb-2 sm:mb-0 hidden sm:inline-block">
            Overview
        </a>
        <a href="/projects/{{ $project_id }}.html#awards" class="bg-[#3e3e3e] lg:{{ $hiddenA }} sm:{{ $hiddenA }} border border-neutral-500 text-white font-semibold py-2 px-4 rounded shadow text-center mx-1 mb-2 sm:mb-0 hidden sm:inline-block">
            Awards
        </a>
        <a href="{{ $project_link }}" target="{{ $target }}" class="bg-[#FFF083] {{ $hidden }} text-gray-800 font-semibold py-2 px-4 rounded shadow text-center mx-1">
            Visit
        </a>
    </div>
</div>



<main class="max-w-[1920px] mx-auto bg-stone-50 overflow-hidden">
    <?php
        $project_link = $project->linkProject;
        if ($project_link == ""){
            $project_link = "#";
            $target = "_self";
            $hidden = "hidden";
        } else {
            $target = "_blank";
            $hidden = "";
        }
    ?>
    
    {{-- <section style="background-image: url('portfolio\public\assets\images\w5.jpg')" --}}
    <section class="bg-black h-[480px] xl:h-[640px] bg-gradient-to-r from-[#2E2824] to-[#12100E] bg-center lg:bg-cover bg-no-repeat bg-fixed">
        <div class="container mx-auto h-full flex items-center justify-center xl:justify-start">
            <div class=" w-[567px] flex flex-col p-12 items-center text-center xl:text-left lg:items-start">
                
                <a href="{{ $project_link }}" target="{{ $target }}">
                    <h1 class="text-white font-primary text-[32px] w-100 lg:text-[42px] leading-none uppercase">{{ $project->projectName }}</h1>
                </a>
                <h1 class="mt-4text-justify text-white">
                    {{ $project->projectType }}&nbsp;<span class="text-[#FFF083] font-medium">{{ $project->developedYear }}</span>
                </h1>
                <span class="text-[10px] text-justify text-white">
                    {{-- <a href="/projects">Home</a> / {{ $project->projectName }} --}}
                </span>
            </div>
        </div>
    </section>

    <section class="mt-[40px] xl:mt-[50px] relative z-20">
        <div class="flex flex-wrap justify-between p-1 max-w-[800px] mx-auto">
            @foreach($projectSkills[$project->id] as $skill)
                <div class=" text-[#5E452A] font-semibold py-2 px-4 text-center m-1">
                    {{ $skill->skillName }}
                </div>
            @endforeach
        </div>
    </section>
    
    <section id="about" class="mt-[40px] xl:mt-[50px] relative z-20">
        <div class="container mx-auto xl:px-0 md:px-4">
            <h2 class="mb-2 text-xl font-bold text-center uppercase">What is {{ $project->projectName }}?</h2>
            
            <div class="flex flex-col xl:flex-row text-container xl:text-left justify-between xl:gap-[4px]">
                <div class="order-2 xl:order-2 max-w-xl xl:max-w-[800px] flex flex-col items-center xl:items-start gap-4 px-4 m-auto">
                    <p class="text-center text-justify">
                        {{ $project->projectDesc }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <section id="overview" class="mt-[40px] xl:mt-[50px] relative z-20">
        <div class="container mx-auto xl:px-0">
            <h2 class="mb-2 text-xl font-bold text-center">Overview</h2>
            @php
                if($project->id == 1){
                    $hiddenP = "hidden";
                    $hiddenD = "";
                } else {
                    $hiddenP = "";
                    $hiddenD = "hidden";
                }
            @endphp
            
            <div class="flex flex-col xl:flex-row xl:gap-[4px] justify-center">
                <div class="max-w-xl xl:max-w-[800px] flex flex-col items-center xl:items-start gap-4 m-auto">
                    <div class="w-full flex justify-center items-center sm:p-4 md:p-4">
                        <p class="weird {{ $hiddenD }} pixelify-sans-7401 prevent-select" >
                            53 75 63 63 65 73 73
                        </p>
                        <div class="w-[800px] h-[400px] bg-neutral-300 flex justify-center items-center">
                            <div class=" p-1 sm:p-4 md:p-4">
                                <iframe width="800" height="400" oncontextmenu="return false;"
                                class="rounded"
                                    src={{ $project->pinURL }}>
                                </iframe>
                            </div>
                            {{-- <div class="{{ $hiddenP }} p-1">
                                <p class="w-[800px] h-[300px] text-center">Display</p>
                            </div> --}}
                        </div>
                        <p class="weird {{ $hiddenD }} pixelify-sans-7401 prevent-select">
                            53 65 61 73 6F 6E 65 64
                            66 6F 72 <br>
                        </p>
                    </div>

                    @foreach($projectPic[$project->id] as $picture)
                        <div class="flex flex-col xl:flex-row text-container xl:text-left justify-between xl:gap-[4px]">
                            <div class="order-2 xl:order-2 max-w-xl xl:max-w-[800px] flex flex-col items-center xl:items-start gap-4 px-4 m-auto">
                                @php
                                    $pin = $picture->pin;
                                    if ($pin == 1){
                                        $cssClass = "hidden";
                                        $cssClass2 = "";
                                    } else {
                                        $cssClass = "";
                                        $cssClass2 = "hidden";
                                    }
                                @endphp
                                <p class="text-center text-justify {{ $cssClass }}">
                                    {{ $picture->descPic }}
                                </p>
                            </div>
                            <q class="text-center text-justify {{ $cssClass2 }} border-l-4 border-stone-500 bg-stone-100 px-8 py-2 rounded">
                                <i>{{ $picture->descPic }}</i>
                            </q>
                        </div>
                    @endforeach

                    <span style="color: #000000; opacity: 1; transform: none;" class="m-auto">...</span>

                    @php
                        static $data = 1;
                    @endphp
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full sm:m-4 md:m-4">
                        @foreach($projectPic[$project->id] as $picture)
                            <div class="bg-neutral-600 flex justify-center items-center rounded shadow">
                                @php
                                    $decoded_image = base64_decode($picture->picture);
                                @endphp
                                <img src="data:image/jpeg;base64,{{ base64_encode($decoded_image) }}"
                                    alt="{{ $picture->name_pic }}"
                                    class="max-w-full h-auto p-1"
                                    oncontextmenu="return false;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        if($project->id == 1){
            $list_awards = $awards;
        } else{
            $list_awards = [];
        }
    @endphp
        <div>
            @if($list_awards)
            <section id="awards" class="mt-[40px] xl:mt-[50px] relative z-20">
                <div class="container mx-auto xl:px-0 md:px-4">
                    <h2 class="mb-2 text-xl font-bold text-center">Award</h2>
                    <div class="align-middle flex justify-center flex-wrap">
                        @foreach($list_awards as $award)
                        <div class="w-[500px] sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 mb-4 mx-2">
                            <div class="bg-white rounded overflow-hidden shadow-lg h-[150px]">
                                <div class="size-50 px-6 py-4 flex flex-col justify-center items-center">
                                    <ion-icon class="text-[#5E452A]" name="trophy"></ion-icon>
                                    <h1 class="font-bold text-xl mb-2">{{ $award->awardName }}</h1>
                                    <p class="text-gray-700 text-base">{{ $award->award_date }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
            </section>
            @endif
        </div>
    
    <div class="h-[100px]"></div>
</main>

@endsection
