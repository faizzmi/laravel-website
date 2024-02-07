<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Project;

class projectController extends Controller
{
    public function projectDashboard() {
        $userId = Session::get('loginId');

        $projects = Project::where('user_id', $userId)->get();
    
        if ($projects->count() === 0) {
            // If $projects is empty, you can handle it here
            return view('admin.projectDashboard')->with('message', 'No projects found.');
        }
    
        return view('admin.projectDashboard', compact('projects'));
    }
    
}
