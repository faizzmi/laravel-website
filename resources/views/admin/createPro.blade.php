<body>
    <h1>Add New Project</h1>

    @if(Session::has('successPro'))
        <div>{{ Session::get('successPro')}}</div>
        @endif
        @if(Session::has('errorPro'))
            <div>{{ Session::get('errorPro')}}</div>
        @endif
    <form method="POST" action="{{ route('store-project') }}">
        @csrf
        </div>
            <label for="developedYear">Year</label>
            <input type="text" id="developedYear" name="developedYear" required>
        </div>
        <div>
            <label for="projectName">Project Name</label>
            <input type="text" id="projectName" name="projectName" required>
        </div>
        <div>
            <label for="projectType">Project Type</label>
            
            <select id="projectType" name="projectType" required>
                <option value="">Select Project Type</option>
                <option value="Web Development">Web Development</option>
                <option value="Mobile App Development">Mobile App Development</option>
                <option value="Data Analysis">Data Analysis</option>
                <option value="Image Processing">Image Processing</option>
                <option value="Quality Assurance">Quality Assurance</option>
                <option value="Testing">Testing</option>
                <option value="Maintenance">Maintenance</option>
            </select>
        </div>

        <div id="skills">
            <label for="skillName">Skill Name</label>
            <input type="text" id="skillName" name="skillName[]" required>
            <label for="skillType">Skill Type</label>
            <select id="skillType" name="skillType[]" required>
                <option value="">Select Skill Type</option>
                <option value="Programming Languages">Programming Languages</option>
                <option value="Declarative Languages">Declarative Languages</option>
                <option value="Technologies">Technologies</option>
                <option value="Framework">Framework</option>
                <option value="Database">Database</option>
                <option value="Design">Design</option>
                <option value="Source Control">Source Control</option>
            </select>
        </div>
        <button type="button" onclick="addSkill()">Add Skill</button>

        <div>
            <label for="projectDesc">Project Description</label><br>
            <textarea id="projectDesc" name="projectDesc" style="width: 80vw; height: 30vh;resize: none;"></textarea>
        </div>

        <div>
            <label for="linkProject">Link Project</label>
            <input type="text" id="linkProject" name="linkProject">
        </div>

        {{-- <div>
            <form action="{{ route('upload.picture') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project_id }}"> <!-- Assuming you have a project_id variable available -->
                <input type="file" name="picture" accept="image/jpeg, image/png, image/gif" required>
                <button type="submit">Upload Picture</button>
            </form>
        </div>

        <div>
            <!-- Display Uploaded Pictures -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Picture</th>
                        <th>Actions</th> <!-- Add a new column for actions -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($pictures as $picture)
                    <tr>
                        <td>{{ $picture->id }}</td>
                        <td><img src="" alt="Picture" class="w-20 h-20"></td>
                        <td>
                            <div>
                                <form action="{{ route('delete.picture', $picture->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                            <div>
                                <a href="{{ $picture->picture }}" target="_blank">Open Picture</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}

        <div>
            <button type="submit" >Add New</button>
            <a href="{{ route('project-dashboard') }}">cancel</a>
        </div>
    </form>

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
                    <option value="Declarative Languages">Declarative Languages</option>
                    <option value="Technologies">Technologies</option>
                    <option value="Framework">Framework</option>
                    <option value="Database">Database</option>
                    <option value="Design">Design</option>
                    <option value="Source Control">Source Control</option>
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