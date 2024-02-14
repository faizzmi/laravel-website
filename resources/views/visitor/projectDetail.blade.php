@extends('layouts.app')

@section('content')
<main class="max-w-[1920px] mx-auto bg-stone-50 overflow-hidden">
    <section>
        
    <h1>{{ $project->projectName }}</h1>
    <a href="{{ route('project-dashboard') }}">Back</a>
    <hr>
    <div>
        @php
            $skillNames = [];
            foreach ($projectSkills[$project->id] as $skill) {
                $skillNames[] = $skill->skillName;
            }
            $skillNamesString = implode(', ', $skillNames);
        @endphp
        {{ $skillNamesString }}
        <br>
        {{ $project->developedYear }}
        {{ $project->projectType }}
    </div>
    <div>
        <a href="{{ $project->linkProject }}" target="_blank">{{ $project->linkProject }}</a>
    </div>
    <div>
        <p>{{ $project->projectDesc }}</p>
    </div>

    </section>
    <div class="h-[300px]"></div>
</main>

@endsection
