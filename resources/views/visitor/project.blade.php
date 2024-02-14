@extends('layouts.app')

@section('content')
<main class="max-w-[1920px] mx-auto bg-stone-50 overflow-hidden">
    <section>
        <div class="containermb-24 mx-auto xl:px-0">
            <div class="text-center mt-4">
                <h2 class="text-4xl font-bold leading-tight">Projects</h2>
                <p class="max-w-3xl mx-auto">
                    The Project Page is a part of a web application that showcases various projects and their details.
                    It serves as a platform for users to explore different projects, learn about their features, and view associated skills.
                </p>
            </div>

            <div class="grid-cols-1 sm:grid md:grid-cols-4 p-8">
                @foreach ($projects as $project)
                    <div class="mx-3 mt-4 flex flex-col self-start rounded-lg bg-white sm:shrink-0 sm:grow sm:basis-0">
                        <a href="{{ route('view-detail', $project->id) }}">
                        <div class="rounded overflow-hidden shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                            <img class="rounded-t-lg" src="{{asset('assets/images/test.webp')}}" alt="Sunset in the mountains">
                            <div class="px-4 pt-4">
                                @foreach ($projectSkills[$project->id] as $skill)
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $skill->skillName }}</span>
                                @endforeach
                            </div>
                            <div class="px-6 pb-4">
                                <div class="font-bold text-xl mb-2">{{ $project->projectName }}</div>
                                <p class="text-gray-700 text-base">{{ $project->projectType }}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
            
        </div>
    </section>
    <div class="h-[300px]"></div>
</main>

@endsection
