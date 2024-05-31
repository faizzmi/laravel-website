@extends('layouts.app')

@section('content')

<style>
    .upright {
        writing-mode: vertical-rl;
        text-orientation: mixed;
    }

    .box {
        color: black;
        padding: 20px;
        margin: 20px;
        display: inline-block;
        vertical-align: middle;
    }
</style>

<main class="max-w-[1920px] mx-auto bg-stone-50 overflow-hidden">
    <section style="background-image: url('assets/images/ng-portfolio1.jpg')"
                class="h-[480px] xl:h-[640px] bg-gradient-to-r from-[#2E2824] to-[#12100E] bg-center lg:bg-cover bg-no-repeat bg-fixed xl:rounded-bl-[290px]">
        <div class="container mx-auto h-full flex items-center justify-center xl:justify-start">
            <div class=" w-[567px] flex flex-col p-12 items-center text-center xl:text-left lg:items-start">
                <h1 class="text-white font-primary text-[64px] lg:text-[84px] leading-none">Faiz Azmi</h1>
                <h1 class="mt-4 mb-8 text-justify text-white">
                    Welcome to my portfolio! As a <strong>Junior Software Engineer</strong> , I showcase my coding, design, and collaboration skills.
                    Explore projects, view my resume, and let's connect for exciting opportunities!
                </h1>
            </div>
        </div>
    </section>

    <section class="mt-[40px] xl:mt-[50px] relative z-20">
        <div class="container mx-auto xl:px-0">
            <div class="flex flex-col xl:flex-row text-container xl:text-left justify-between items-center gap-4 xl:gap-[74px]">
                <div class="order-2 xl:order-none max-w-xl xl:max-w-[700px] flex flex-col items-center xl:items-start gap-4 p-8">
                    <h2 class="mb-4 text-4xl font-bold">About Me</h2>
                    <p class="text-center md:text-left lg:text-justify">
                        {{-- {{ $user->about }} --}}
                        @foreach ($user as $use)
                            {{ $use->about }}
                        @endforeach
                        {{-- As a software engineering student, having a strong grasp of algorithms can really make me stand out.
                        Algorithms are at the heart of solving complex problems efficiently in software development.
                        Understanding different types of algorithms, their time and space complexities,
                        and knowing when to apply them appropriately can set you apart from other students.
                        Additionally, I have hands-on experience with various programming languages, frameworks, and tools,
                        along with a demonstrated ability to work on real-world projects, can further distinguish you in the
                        field of software engineering. --}}
                    </p>
                    <div class="flex items-center justify-center xl:justify-start gap-4">
                        <div class="bg-[#5E452A]/15 w-[63px] h-[63px] rounded-full flex justify-center items-center">
                            <a href="tel:0136773756">
                                <ion-icon class="text-[#5E452A] hover:text-[#CAC6C0] text-4xl" name="call"></ion-icon>
                            </a>
                        </div>
                        <div class="text-left">
                            <div class="text-lg font-bold">013 6773 756</div>
                            <div>any quiry call or email </div>
                        </div>
                    </div>
                    
                    <a href="mailto:fazizzmi74@gmail.com" class="bg-[#5E452A] text-white px-5 py-2 rounded-full hover:bg-[#CAC6C0] flex items-center gap-2">
                        Email Now
                        <ion-icon name="arrow-forward"></ion-icon>
                    </a>
                </div>
                
                <div class="order-1 md:order-2 xl:order-none xl:max-w-[350px] mx-auto xl:max-w-none xl:mx-0">
                    <img src="{{asset('assets/images/images.jpg')}}" alt="">
                    {{-- <span class="box upright md:text-left lg:text-justify">
                        75 6E 66 69 6E 69 73 68 65 64 2E <br />
                        65 74 65 72 6E 61 6C 6C 79
                    </span> --}}
                </div>
            </div>
            
        </div>
    </section>

    <section class="mt-[40px] xl:mt-[50px] relative z-20">
        <div class="container mx-auto xl:px-0">
            <h2 class="mb-8 md:mb-8 text-4xl font-bold text-center">Work Experience</h2>
            <div class="flex flex-col xl:flex-row text-container xl:text-left justify-between xl:gap-[4px]">
                <div class="max-w-xl xl:max-w-[1000px] m-auto flex flex-col items-center xl:items-start gap-4 p-8">
                    <div class="relative overflow-x-auto shadow-md rounded-lg w-full lg:w-[1000px]">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-white uppercase bg-[#5E452A]">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Work Experience
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exp as $xp)
                                    @php
                                        $fromDate = new DateTime($xp->from_date_exp);
                                        $toDate = new DateTime($xp->to_date_exp);
                                        $currentDate = new DateTime();
                    
                                        // Format dates for display
                                        $fromDateString = $fromDate->format('Y');
                                        $toDateString = $toDate->format('Y');
                    
                                        // Determine if the experience is ongoing
                                        $isOngoing = $currentDate < $toDate;
                                    @endphp
                    
                                    <tr class="bg-white border-b">
                                        <td scope="row" class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-gray-900">
                                                {{ $xp->expName }} - {{ $xp->expPosition }}
                                            </div>
                                            <div>
                                                {{ $xp->expPlace }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 truncate text-right">
                                            {{ $fromDateString }} - {{ $isOngoing ? 'Present' : $toDateString }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                
                
            </div>
        </div>
    </section>

    <section class="mt-[40px] xl:mt-[50px] relative z-20">
        <div class="container mx-auto xl:px-0">
            <h2 class="mb-8 md:mb-8 text-4xl font-bold text-center">My Skill</h2>
            
            <div class="flex flex-col xl:flex-row text-container xl:text-left justify-between xl:gap-[4px]">
                <div class="order-2 xl:order-2 max-w-xl xl:max-w-[410px] flex flex-col items-center xl:items-start gap-4 m-auto">
                    <p class="text-center text-justify sm:mt-8">
                        As a software engineer, I demonstrate my skills by showcasing projects that highlight my proficiency in coding,
                        problem-solving, and collaboration. You can explore all of my projects and awards, with a visual representation through a graph,
                        to see my progression and achievements across various technical areas
                    </p>
                    <span class="font-bold">Core Skill</span>
                    <div class="grid gap-2 p-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($rankedSkills as $cs)
                            <div class="bg-transparent text-gray-800 font-semibold py-2 px-4 border border-[#5E452A] rounded shadow w-full text-center">
                                {{ $cs->skillName }}
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="align-middle">
                        <button onclick="location.href = '/projects';" class="bg-[#5E452A] text-white px-5 py-2 rounded-full hover:bg-[#CAC6C0]">
                            See All Projects
                            <ion-icon name="arrow-forward"></ion-icon>
                        </button>
                        <button onclick="location.href = '/awards';" class="bg-[#5E452A] text-white px-5 py-2 rounded-full hover:bg-[#CAC6C0]">
                            See All Awards
                            <ion-icon name="arrow-forward"></ion-icon>
                        </button>
                    </div>
                </div>
                
                <div class="order-1 md:order-1 xl:order-none w-auto xl:max-w-none mx-auto">
                    <div class="w-auto items-center">
                        <div class="grid items-center">
                            <div id="pie-chart"></div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="h-[100px]"></div>
</main>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const pieData = @json($pieData);

    const chartConfig = {
        series: Object.values(pieData), // Use the values of $pieData as the series data
        labels: Object.keys(pieData), // Use the keys of $pieData as the labels
        chart: {
            type: "pie",
            width: 550,
            height: 450,
            toolbar: {
                show: false,
            },
        },
        title: {
            show: "",
        },
        dataLabels: {
            enabled: true,
        },
        colors: ["#CAC6C0", "#7E7366", "#5E452A", "#2E2824", "#12100E"],
        legend: {
            position: "bottom" ,
        },
    };

    const chart = new ApexCharts(document.querySelector("#pie-chart"), chartConfig);

    chart.render();
</script>
@endsection
