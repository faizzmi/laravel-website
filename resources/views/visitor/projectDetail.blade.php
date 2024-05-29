@extends('layouts.app')

@section('content')
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
<div class="relative">
    <div class="fixed">
        <a href="{{ $project_link }}" target="{{ $target }}" class="bg-[#FFF083] {{ $hidden }} text-gray-800 font-semibold py-2 px-4 rounded shadow w-30 text-center inline-block">
            Visit Site
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
                    <h1 class="text-white font-primary text-[32px] w-100 lg:text-[42px] leading-none">{{ $project->projectName }}</h1>
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
    
    

    <section class="mt-[40px] xl:mt-[50px] relative z-20">
        <div class="container mx-auto xl:px-0">
            <h2 class="mb-2 text-xl font-bold text-center">What is {{ $project->projectName }}?</h2>
            
            <div class="flex flex-col xl:flex-row text-container xl:text-left justify-between xl:gap-[4px]">
                <div class="order-2 xl:order-2 max-w-xl xl:max-w-[800px] flex flex-col items-center xl:items-start gap-4 px-8 m-auto">
                    <p class="text-center text-justify">
                        {{ $project->projectDesc }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="mt-[40px] xl:mt-[50px] relative z-20">
        <div class="container mx-auto xl:px-0">
            <h2 class="mb-2 text-xl font-bold text-center">Overview</h2>
            
            <div class="flex flex-col xl:flex-row text-container xl:text-left justify-between xl:gap-[4px]">
                <div class="order-2 xl:order-2 max-w-xl xl:max-w-[800px] flex flex-col items-center xl:items-start gap-4 m-auto">
                    
                </div>
            </div>
        </div>
    </section>
    <div class="h-[300px]"></div>
</main>

@endsection
