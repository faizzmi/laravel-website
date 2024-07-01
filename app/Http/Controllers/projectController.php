<?php

namespace App\Http\Controllers;

use App\Models\Pictures;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Skill;
use Session;
use App\Models\Project;
use App\Models\Award;

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
    
    public function storePicture(Request $request)
    {
        $project_id = $request->project_id;
        
        $request->validate([
            'file' => 'required|mimes:jpeg,bmp,png,pdf,jpg',
            'name' => 'required|max:255',
        ]);
        
        if ($request->hasFile('file')) {
            $path = $request->file('file')->getRealPath();
            $ext = $request->file('file')->extension();
            $doc = file_get_contents($path);
            $base64 = base64_encode($doc);
            $mime = $request->file('file')->getClientMimeType();
        
            $picture = new Pictures();
            $picture->project_id = $project_id;
            $picture->name_pic = $request->name . '.' . $ext;
            $picture->descPic = $request->descPic ?? null;
            $picture->pin = $request->pin ?? false;
            $picture->picture = $base64;
            $picture->mime = $mime;
            
            $picture->save();
        
            return redirect('/dashboard/project/edit/' . $project_id)->with('successPro', 'Picture uploaded successfully.');
        } else {
            return redirect('/dashboard/project/edit/' . $project_id)->with('errorPro', 'Picture failed to upload.');
        }
        
    }
    
    public function deletePicture($id)
    {
        $picture = Pictures::findOrFail($id);
        $project_id = $picture->project_id;
        $picture->delete();

        // return back()->with('success', 'Picture deleted successfully.');
        return redirect('dashboard/project/edit/' . $project_id)->with('successPro','Picture deleted successfully.');
    }

    public function download($id)
    {
        $picture = Pictures::find($id);

        $file_contents = base64_decode($picture->picture);

        return response($file_contents)
            ->header('Cache-Control', 'no-cache private')
            ->header('Content-Description', 'File Transfer')
            ->header('Content-Type', $picture->mime)
            ->header('Content-length', strlen($file_contents))
            ->header('Content-Disposition', 'attachment; filename=' . $picture->name_pic)
            ->header('Content-Transfer-Encoding', 'binary');
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
            'file' => 'mimes:jpg,png,pdf|max:2048'
        ]);

        $userId = Session::get('loginId');

        $project = new Project();
        $project->user_id = $userId;
        $project->developedYear = $request->developedYear;
        $project->projectName = $request->projectName;
        $project->projectType = $request->projectType;
        $project->projectDesc = $request->projectDesc;
        $project->linkProject = $request->linkProject;
        $project->pinURL = $request->pinURL;
        $res = $project->save();
        
        if($res){

            foreach($request->skillName as $key=>$skillName){
                $skill = new Skill();
                $skill->project_id = $project->id;
                $skill->skillName = $skillName;
                $skill->skillType = $request->skillType[$key];
                $skill->save();
            }

            // $pic = new Pictures();
            // $pic->project_id = $project->id;
            // $pic->picture = $request->file;
            // $pic->save();

            return redirect('dashboard/project')->with('successPro','Your project added succesfully');
        }else{
            return redirect('dashboard/project')->with('errorPro','Something wrong');
        }
    }

    public function editeProject(Project $project) {
        $projectId = $project->id;
        $skills = Skill::where('project_id', $projectId)->get();
        $pictures = Pictures::where('project_id', $projectId)->get();
        return view('admin.editProject', compact('project','skills','pictures'));
    }

    public function updateProject(Request $request, $id) {
        $request->validate([
            'developedYear' => 'required',
            'projectName' => 'required',
            'projectType' => 'required',
        ]);
    
        $project = Project::findOrFail($id);
    
        $project->update([
            'developedYear' => $request->developedYear,
            'projectName' => $request->projectName,
            'projectType' => $request->projectType,
            'projectDesc' => $request->projectDesc,
            'linkProject' => $request->linkProject,
            'pinURL' => $request->pinURL,
        ]);
    
        // Remove existing skills and add updated ones
        $project->skills()->delete();

        foreach ($request->skillName as $key => $skillName) {
            $skill = new Skill();
            $skill->project_id = $project->id;
            $skill->skillName = $skillName;
            $skill->skillType = $request->skillType[$key];
            $skill->save();
        }

        return redirect('dashboard/project')->with('successPro', 'Your project updated successfully');
    }

    public function destroyProject(Project $project)
    {
        $project->delete();

        return redirect("dashboard/project")->with('successPro', 'Project deleted successfully.');
    }
    
}
