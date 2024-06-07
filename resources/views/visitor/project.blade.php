@extends('layouts.app')

@section('content')
<main class="max-w-[1920px] mx-auto bg-stone-50 overflow-hidden">
    <section>
        <div class="containermb-24 mx-auto xl:px-0">
            <div class="text-center mt-4">
                <h2 class="text-4xl font-bold leading-tight">Projects</h2>
            </div>

            <div class="grid-cols-2 sm:grid md:grid-cols-4 p-8">
                @foreach ($projects as $project)
                    <div class="mx-3 mt-4 flex flex-col self-start rounded-lg bg-white sm:shrink-0 sm:grow sm:basis-0">
                        <a href="{{ route('view-detail', $project->id) }}">
                        <div class="rounded overflow-hidden shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                            {{-- <img class="rounded-t-lg" src="{{asset('assets/images/test.webp')}}" alt="Sunset in the mountains"> --}}
                            
                            <div class="size-60 px-6 pt-4">
                                @if ($project->pinProj == 1)
                                    <ion-icon class="text-yellow-600" name="trophy"></ion-icon>
                                @else
                                    <ion-icon name="folder"></ion-icon>
                                @endif
                                <div class="font-bold text-xl mb-2 uppercase">{{ $project->projectName }}</div>
                                <p class="text-gray-700 text-base ">{{ $project->projectType }}</p>
                                {{-- <div class="pt-2">
                                    @foreach ($projectSkills[$project->id] as $skill)
                                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $skill->skillName }}</span>
                                    @endforeach
                                </div> --}}
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
            
        </div>
    </section>
    <div class="h-[100px]"></div>
</main>

@endsection
