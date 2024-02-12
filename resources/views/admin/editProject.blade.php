<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
<body>
    <h1>Edit Project</h1>
    <div>
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
                <select id="projectType" name="projectType" required>
                    <option value="">Select Project Type</option>
                    <option value="Web Development" {{ $project->projectType == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                    <option value="Mobile App Development" {{ $project->projectType == 'Mobile App Development' ? 'selected' : '' }}>Mobile App Development</option>
                    <option value="Data Analysis" {{ $project->projectType == 'Data Analysis' ? 'selected' : '' }}>Data Analysis</option>
                    <option value="Image Processing" {{ $project->projectType == 'Image Processing' ? 'selected' : '' }}>Image Processing</option>
                    <option value="Quality Assurance" {{ $project->projectType == 'Quality Assurance' ? 'selected' : '' }}>Quality Assurance</option>
                    <option value="Testing" {{ $project->projectType == 'Testing' ? 'selected' : '' }}>Testing</option>
                    <option value="Maintenance" {{ $project->projectType == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                    <!-- Add more options as needed -->
                </select>
            </div>

            <div id="skills">
                <label for="skillName">Skill </label>
                @if(Session::has('successSkill'))
                    <div>{{ Session::get('successSkill')}}</div>
                @endif
                @if(Session::has('errorSkill'))
                    <div>{{ Session::get('errorSkill')}}</div>
                @endif
                <button type="button" onclick="addSkill()">Add Skill</button>
                
                @foreach ($skills as $index => $skill)
                <div>
                    <label for="skillName">Skill Name</label>
                    <input type="text" id="skillName" name="skillName[]" value="{{ $skill->skillName }}" required>
                    <label for="skillType">Skill Type</label>
                    <select id="skillType" name="skillType[]" required>
                        <option value="">Select Skill Type</option>
                        <option value="Programming Languages" {{ $skill->skillType == 'Programming Languages' ? 'selected' : '' }}>Programming Languages</option>
                        <option value="Technologies" {{ $skill->skillType == 'Technologies' ? 'selected' : '' }}>Technologies</option>
                        <option value="Framework" {{ $skill->skillType == 'Framework' ? 'selected' : '' }}>Framework</option>
                        <option value="Languages" {{ $skill->skillType == 'Languages' ? 'selected' : '' }}>Languages</option>
                        <option value="Database" {{ $skill->skillType == 'Database' ? 'selected' : '' }}>Database</option>
                        <option value="Design" {{ $skill->skillType == 'Design' ? 'selected' : '' }}>Design</option>
                    </select>
                    
                    @if (count($skills) > 1)
                        <form action="{{ route('skills-destroy', $skill->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remove</button>
                        </form>
                    @endif
                    
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
                <button type="submit" >Save edit</button>
                <a href="{{ route('project-dashboard') }}">cancel</a>
            </div>
        </form>
    </div>

    <script>
        function addSkill() {
            var skillsDiv = document.getElementById("skills");
            var newSkillDiv = document.createElement("div");
            newSkillDiv.innerHTML = `
                <label for="skillName">Skill Name</label>
                <input type="text" name="skillName[]" required>
                <label for="skillType">Skill Type</label>
                <select name="skillType[]" required>
                <option value="">Select Skill Type</option>
                <option value="Programming Languages">Programming Languages</option>
                <option value="Technologies">Technologies</option>
                <option value="Framework">Framework</option>
                <option value="Languages">Languages</option>
                <option value="Database">Database</option>
                <option value="Design">Design</option>
                </select>
                <button type="button" onclick="removeSkill(this)">Remove</button>
            `;
            skillsDiv.appendChild(newSkillDiv);
        }
        
        function removeSkill(button) {
            button.parentElement.remove();
        }

        
    </script>
</body>