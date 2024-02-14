<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;

class visitorController extends Controller
{
    public function listProjects()
    {
        $projects = Project::where('user_id', 1)->get();

        $projectSkills = [];
    
        foreach ($projects as $project) {
            $skills = Skill::where('project_id', $project->id)->get();
            $projectSkills[$project->id] = $skills;
        }

        return view('visitor.project', compact('projects', 'projectSkills'));
    }

    public function viewProjects(Project $project)
    {
        $projects = Project::where('user_id', 1)->get();

        $projectSkills = [];
    
        foreach ($projects as $project) {
            $skills = Skill::where('project_id', $project->id)->get();
            $projectSkills[$project->id] = $skills;
        }

        return view('visitor.projectDetail', compact('project', 'projectSkills'));
    }

    public function listAwards()
    {
        $awards = Award::where('user_id', 1)->get();

        return view('visitor.awards', compact('awards'));
    }
}
