<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Project</title>
</head>
<body>
    <h1>Edit Project</h1>
    @if(Session::has('successPro'))
        <div><p class="text-green-500">{{ Session::get('successPro') }}</p></div>
    @endif
    @if(Session::has('errorPro'))
        <div><p class="text-red-500">{{ Session::get('errorPro') }}</p></div>
    @endif
    <div>
        <form method="POST" action="{{ route('update-project', $project->id) }}">
            @method('PUT')
            @csrf

            <div>
                <label for="developedYear">Year</label>
                <input type="text" id="developedYear" name="developedYear" value="{{ $project->developedYear }}" required>
            </div>
            <div>
                <label for="projectName">Project Name</label>
                <input type="text" id="projectName" name="projectName" value="{{ $project->projectName }}" required>
            </div>
            <div>
                <label for="projectType">Project Type</label>
                <select id="projectType" name="projectType" required>
                    <option value="">Select Project Type</option>
                    <option value="Web Development" {{ $project->projectType == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                    <option value="Mobile App Development" {{ $project->projectType == 'Mobile App Development' ? 'selected' : '' }}>Mobile App Development</option>
                    <option value="Data Analysis" {{ $project->projectType == 'Data Analysis' ? 'selected' : '' }}>Data Analysis</option>
                    <option value="Image Processing" {{ $project->projectType == 'Image Processing' ? 'selected' : '' }}>Image Processing</option>
                    <option value="Quality Assurance" {{ $project->projectType == 'Quality Assurance' ? 'selected' : '' }}>Quality Assurance</option>
                    <option value="Testing" {{ $project->projectType == 'Testing' ? 'selected' : '' }}>Testing</option>
                    <option value="Maintenance" {{ $project->projectType == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </div>

            <div id="skills">
                <label for="skillName">Skill </label>
                @if(Session::has('successSkill'))
                    <div>{{ Session::get('successSkill') }}</div>
                @endif
                @if(Session::has('errorSkill'))
                    <div>{{ Session::get('errorSkill') }}</div>
                @endif
                <button type="button" onclick="addSkill()">Add Skill</button>
                
                @foreach ($skills as $index => $skill)
                <div class="skill">
                    <label for="skillName">Skill Name</label>
                    <input type="text" id="skillName" name="skillName[]" value="{{ $skill->skillName }}" required>
                    <label for="skillType">Skill Type</label>
                    <select id="skillType" name="skillType[]" required>
                        <option value="">Select Skill Type</option>
                        <option value="Programming Languages" {{ $skill->skillType == 'Programming Languages' ? 'selected' : '' }}>Programming Languages</option>
                        <option value="Declarative Languages" {{ $skill->skillType == 'Declarative Languages' ? 'selected' : '' }}>Declarative Languages</option>
                        <option value="Technologies" {{ $skill->skillType == 'Technologies' ? 'selected' : '' }}>Technologies</option>
                        <option value="Framework" {{ $skill->skillType == 'Framework' ? 'selected' : '' }}>Framework</option>
                        <option value="Languages" {{ $skill->skillType == 'Languages' ? 'selected' : '' }}>Languages</option>
                        <option value="Database" {{ $skill->skillType == 'Database' ? 'selected' : '' }}>Database</option>
                        <option value="Design" {{ $skill->skillType == 'Design' ? 'selected' : '' }}>Design</option>
                        <option value="Source Control" {{ $skill->skillType == 'Source Control' ? 'selected' : '' }}>Source Control</option>
                        <option value="Library" {{ $skill->skillType == 'Library' ? 'selected' : '' }}>Library</option>
                    </select>
                    <button type="button" onclick="removeSkill(this)">Remove</button>
                </div>
                @endforeach
            </div>
            <div>
                <label for="projectDesc">Project Description</label><br>
                <textarea id="projectDesc" name="projectDesc" style="width: 80vw; height: 30vh;resize: none;">{{ $project->projectDesc }}</textarea>
            </div>

            <div>
                <label for="linkProject">Link Project</label>
                <input type="text" id="linkProject" name="linkProject" value="{{ $project->linkProject }}">
            </div>

            <div>
                <label for="pinURL">Pin URL</label>
                <input type="text" id="pinURL" name="pinURL" value="{{ $project->pinURL }}">
            </div>
            
            <div>
                <button type="submit">Save edit</button>
                <a href="{{ route('project-dashboard') }}">Cancel</a>
            </div>
        </form>
    </div>

    {{-- <div>
        <div>
            <form action="{{ route('upload-picture') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="picture">Upload Picture</label>
                    <input type="text" id="name_pic" name="name_pic" required>
                    <input type="hidden" name="project_id" value="{{ $project->id }}"> <!-- Assuming you have a project_id variable available -->
                    <input type="file" name="picture" accept="image/jpeg, image/png, image/gif" required>
                    <button type="submit">Upload Picture</button>
                </div>
            </form>
        </div> --}}
        
        <div>
            <!-- Display Uploaded Pictures -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Picture Name</th>
                        <th>Description Name</th>
                        <th>Actions</th> <!-- Add a new column for actions -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($pictures as $picture)
                    <tr>
                        <td>{{ $picture->id }}</td>
                        <td>{{ $picture->name_pic }}</td>
                        <td>{{ $picture->descPic }}</td>
                        <td>
                            <div>
                                <form action="{{ route('delete-picture', $picture->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                            <div>
                                <td><a href="{{ route('pic-download', $picture->id) }}">Download</a></td>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div>
        
    <form action="{{ route('upload-picture') }}" method="post" enctype="multipart/form-data">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div>
                <br />
                    @csrf
                    <div class="form-group">
                        <label for="name">Name Pic</label>
                        <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter document name">
                        <br>
                        <label for="name">Description Pic</label><br>
                        <textarea class="form-control" name="descPic" id="descPic" placeholder="Enter desc pic" style="width: 80vw; height: 30vh;resize: none;"></textarea>

                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="file" required>
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                    </div>
                    <div>
                        <label for="pin">Pin</label>
                        <input type="checkbox" name="pin" id="pin" value="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
    </div>
    <script>
        function addSkill() {
            console.log("Adding skill...");
            var skillsDiv = document.getElementById("skills");
            var newSkillDiv = document.createElement("div");
            newSkillDiv.classList.add("skill");
            newSkillDiv.innerHTML = `
                <label for="skillName">Skill Name</label>
                <input type="text" name="skillName[]" required>
                <label for="skillType">Skill Type</label>
                <select name="skillType[]" required>
                    <option value="">Select Skill Type</option>
                    <option value="Programming Languages">Programming Languages</option>
                    <option value="Declarative Languages">Declarative Languages</option>
                    <option value="Technologies">Technologies</option>
                    <option value="Framework">Framework</option>
                    <option value="Languages">Languages</option>
                    <option value="Database">Database</option>
                    <option value="Design">Design</option>
                    <option value="Source Control">Source Control</option>
                    <option value="Library">Library</option>
                </select>
                <button type="button" onclick="removeSkill(this)">Remove</button>
            `;
            skillsDiv.appendChild(newSkillDiv);
        }
        
        function removeSkill(button) {
            console.log("Removing skill...");
            button.parentElement.remove();
        }
    </script>
</body>
</html>