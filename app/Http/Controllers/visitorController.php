<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Contacts;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Pictures;
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
            ORDER BY skillCount DESC
        ");


        return view('visitor.home', compact('skills','exp','user','rankedSkills','pieData'));
    }

    public function contactUser(){
        $contact = Contacts::where('id', 1)->get();
        return view('partials.visitor_footer', compact('contact'));
    }

    public function listProjects()
    {
        $projects = Project::where('user_id', 1)
            ->orderBy('pinProj', 'desc')
            ->orderBy('developedYear', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        // $projects = DB::select("
        //     SELECT * FROM project WHERE user_id = 1
        //     ORDER BY developedYear DESC, created_at DESC
        // ");

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
        $awards = Award::all();

        foreach ($projects as $proj) {
            $skills = Skill::where('project_id', $proj->id)->orderBy('skillName', 'asc')->get();
            $projectSkills[$proj->id] = $skills;

            $pictures = Pictures::where('project_id',$proj->id)->get();
            $projectPic[$proj->id] = $pictures;
            $display[$proj->id] = $pictures->first();
        }

        return view('visitor.projectDetail', compact('project', 'projectSkills','awards','projectPic','display'));
    }

    public function listAwards()
    {
        $awards = Award::where('user_id', 1)->get();

        return view('visitor.awards', compact('awards'));
    }
}
