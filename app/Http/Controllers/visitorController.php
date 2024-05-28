<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Support\Facades\DB;

class visitorController extends Controller
{
    public function visitorDashboard(){
        $skills = Skill::all()->toArray();
        $projects = Project::where('user_id', 1)->get();
        $groupedProjects = $projects->groupBy('projectType');
        $projectTypeCounts = $groupedProjects->map->count();
        $pieData = $projectTypeCounts->toArray();
        $exp = Experience::where('user_id', 1)->get();
        $user = User::where('id', 1)->get();
        
        $rankedSkills = DB::select("
            WITH RankedSkills AS (
                SELECT
                    skillName,
                    skillType,
                    COUNT(*) AS skillCount,
                    ROW_NUMBER() OVER(PARTITION BY skillType ORDER BY COUNT(*) DESC) AS Rank
                FROM skill
                GROUP BY skillName, skillType
            )
            SELECT
                skillName,
                skillType,
                skillCount
            FROM RankedSkills
            WHERE Rank = 1
        ");


        return view('visitor.home', compact('skills','exp','user','rankedSkills', 'pieData'));
    }

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

        foreach ($projects as $proj) {
            $skills = Skill::where('project_id', $proj->id)->get();
            $projectSkills[$proj->id] = $skills;
        }

        return view('visitor.projectDetail', compact('project', 'projectSkills'));
    }

    public function listAwards()
    {
        $awards = Award::where('user_id', 1)->get();

        return view('visitor.awards', compact('awards'));
    }
}
