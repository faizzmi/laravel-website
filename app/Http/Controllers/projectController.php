<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
    
        return view('admin.projectDashboard', compact('user', 'projects'));
    }

    public function viewProject(Project $project){
        return view('admin.viewProject', compact('project'));
    }

    public function createProject() {
        return view('admin.createProject');
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
            return redirect('dashboard/project')->with('successPro','Your project edded succesfully');
        }else{
            return redirect('dashboard/project')->with('errorPro','Something wrong');
        }
    }

    public function editeProject(Project $project) {
        return view('admin.editProject', compact('project'));
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
