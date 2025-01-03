<div>
    <h1>{{ $user->name }}'s Project</h1>
    <a href="/dashboard">back</a>
</div>

<hr>
<div>
    <a href="{{ route('create-project') }}">Add Project</a>
</div>


@if (isset($message))
    <p>{{ $message }}</p>
@else
    <div>
        @if(Session::has('successPro'))
            <div><p class="text-green-500">{{ Session::get('successPro')}}</p></div>
        @endif
        @if(Session::has('errorPro'))
            <div><p class="text-red-500">{{ Session::get('errorPro')}}</p></div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type of Project</th>
                    <th>Skills</th>
                    <th>Link Project</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->developedYear }}</td>
                        <td><a href="{{ route('view-project', $project->id) }}">{{ $project->projectName }}</a></td>
                        <td>{{ $project->projectDesc }}</td>
                        <td>{{ $project->projectType }}</td>
                        <td>
                            <ul>
                                @foreach ($projectSkills[$project->id] as $skill)
                                    <li>{{ $skill->skillName }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td><a href="{{ $project->linkProject }}" target="_blank">{{ $project->linkProject }}</a></td>
                        <td>
                            <a href="{{ route('edit-project', $project->id) }}">Edit</a>
                            <form action="{{ route('delete-project', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this project record?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

