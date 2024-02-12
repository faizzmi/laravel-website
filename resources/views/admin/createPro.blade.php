<body>
    <h1>Add New Project</h1>

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
                <option value="Technologies">Technologies</option>
                <option value="Framework">Framework</option>
                <option value="Languages">Languages</option>
                <option value="Database">Database</option>
                <option value="Design">Design</option>
            </select>
        </div>
        <button type="button" onclick="addSkill()">Add Skill</button>

        <div>
            <label for="projectDesc">Project Description</label>
            <textarea id="projectDesc" name="projectDesc"></textarea>
        </div>

        <div>
            <label for="linkProject">Link Project</label>
            <input type="text" id="linkProject" name="linkProject">
        </div>

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