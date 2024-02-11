<body>
    <h1>Edit Project</h1>

    <form method="POST" action="{{ route('update-project', $project->id) }}">
        @if(Session::has('successAbout'))
            <div>{{ Session::get('successPro')}}</div>
        @endif
        @if(Session::has('errorAbout'))
            <div>{{ Session::get('errorPro')}}</div>
        @endif
        @method('PUT')
        @csrf

        </div>
            <label for="developedYear">Year</label>
            <input type="text" id="developedYear" name="developedYear" value="{{ $project->developedYear }}" required>
        </div>
        <div>
            <label for="projectName">Project Name</label>
            <input type="text" id="projectName" name="projectName" value="{{ $project->projectName }}" required>
        </div>
        <div>
            <label for="projectType">Project Type</label>
            <input type="text" id="projectType" name="projectType" value="{{ $project->projectType }}" required>
        </div>
        <div>
            <label for="projectDesc">Project Description</label>
            <textarea id="projectDesc" name="projectDesc">{{ $project->projectDesc }}</textarea>
        </div>

        <div>
            <label for="linkProject">Link Project</label>
            <input type="text" id="linkProject" name="linkProject" value="{{ $project->linkProject }}">
        </div>

        <div>
            <button type="submit" >Save edit</button>
            <a href="{{ route('project-dashboard') }}">cancel</a>
        </div>
    </form>
</body>