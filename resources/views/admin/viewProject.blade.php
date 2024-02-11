<a href="{{ route('project-dashboard') }}">Back</a>

<h2>{{ $project->projectName }}</h2>

<div>
    {{ $project->developedYear }}
    {{ $project->projectType }}
</div>
<div>
    <a href="{{ $project->linkProject }}" target="_blank">{{ $project->linkProject }}</a>
</div>
<div>
    <p>{{ $project->projectDesc }}</p>
</div>
