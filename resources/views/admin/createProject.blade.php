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
            <input type="text" id="projectType" name="projectType" required>
        </div>
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
</body>