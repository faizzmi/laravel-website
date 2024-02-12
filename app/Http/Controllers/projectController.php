<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Skill;
use Session;
use App\Models\Project;

class projectController extends Controller
{
    public function projectDashboard() {
        $userId = Session::get('loginId');
        $user = User::find($userId);
    
        $projects = Project::where('user_id', $userId)->get();
        
        if ($projects->isEmpty()) {
            // If $projects is empty, you can handle it here
            return view('admin.projectDashboard', compact('user'))
                ->with('message', 'No projects found.');
        }
    
        // Initialize an empty array to store skills for each project
        $projectSkills = [];
    
        foreach ($projects as $project) {
            $skills = Skill::where('project_id', $project->id)->get();
            $projectSkills[$project->id] = $skills;
        }
    
        return view('admin.projectDashboard', compact('user', 'projects', 'projectSkills'));
    }
    
    

    public function viewProject(Project $project){
        $userId = Session::get('loginId');
        $user = User::find($userId);
        
        $projects = Project::where('user_id', $userId)->get();
        $projectSkills = [];

        foreach ($projects as $proj) {
            $skills = Skill::where('project_id', $proj->id)->get();
            $projectSkills[$proj->id] = $skills;
        }
        
        return view('admin.viewProject', compact('project','projectSkills'));
    }

    public function createProject() {
        return view('admin.createPro');
    }

    public function storeProject(Request $request) {
        $request->validate([
            'developedYear' => 'required',
            'projectName' => 'required',
            'projectType' => 'required',
        ]);

        $userId = Session::get('loginId');

        $project = new Project();
        $project->user_id = $userId;
        $project->developedYear = $request->developedYear;
        $project->projectName = $request->projectName;
        $project->projectType = $request->projectType;
        $project->projectDesc = $request->projectDesc;
        $project->linkProject = $request->linkProject;
        $res = $project->save();
        
        if($res){
            $projectId = $project->id;

            foreach($request->skillName as $key=>$skillName){
                $skill = new Skill();
                $skill->project_id = $projectId;
                $skill->skillName = $skillName;
                $skill->skillType = $request->skillType[$key];
                $skill->save();
            }
            return redirect('dashboard/project')->with('successPro','Your project edded succesfully');
        }else{
            return redirect('dashboard/project')->with('errorPro','Something wrong');
        }
    }

    public function editeProject(Project $project) {
        $projectId = $project->id;
        $skills = Skill::where('project_id', $projectId)->get();
        return view('admin.editProject', compact('project','skills'));
    }

    public function updateProject(Request $request, $id) {
        $request->validate([
            'developedYear' => 'required',
            'projectName' => 'required',
            'projectType' => 'required',
        ]);

        $project = Project::findOrFail($id);

        $project->developedYear = $request->developedYear;
        $project->projectName = $request->projectName;
        $project->projectType = $request->projectType;
        $project->projectDesc = $request->projectDesc;
        $project->linkProject = $request->linkProject;
        $res = $project->save();

        if($res){
            $projectID = $project->id;

            foreach ($request->skillName as $key => $skillName) {
                // Check if skill already exists for this project with the same name and type
                $existingSkill = Skill::where('project_id', $projectID)
                                    ->where('skillName', $skillName)
                                    ->where('skillType', $request->skillType[$key])
                                    ->first();

                if (!$existingSkill) {
                    // If skill doesn't exist, create a new one
                    $skill = new Skill();
                    $skill->project_id = $projectID;
                    $skill->skillName = $skillName;
                    $skill->skillType = $request->skillType[$key];
                    $skill->save();
                }
            }
            return redirect('dashboard/project')->with('successPro','Your project updated succesfully');
        }else{
            return redirect('dashboard/project')->with('errorPro','Something wrong');
        }
    }

    public function destroyProject(Project $project)
    {
        $project->delete();

        return redirect("dashboard/project")->with('successPro', 'Project deleted successfully.');
    }
    
}
