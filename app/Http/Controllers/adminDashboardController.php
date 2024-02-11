<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Educations;
use App\Models\Experience;
use Session;

use Illuminate\Http\Request;

class adminDashboardController extends Controller
{
    //
    public function dashboard() {
        $userId = Session::get('loginId');
        $data = User::find($userId);
        $experiences = Experience::where('user_id', $userId)->get();
        $educations = Educations::where('user_id', $userId)->get();
    
        if ($educations->isEmpty() && $experiences->isEmpty()) {
            // If both educations and experiences are empty, handle it here
            return view('admin.dashboardAdmin', compact('data', 'educations', 'experiences'))
                ->with('messageEdu', 'No Education found.')
                ->with('messageExp', 'No Experience found.');
        } elseif ($educations->isEmpty()) {
            // If educations is empty, handle it here
            return view('admin.dashboardAdmin', compact('data', 'educations', 'experiences'))
                ->with('messageEdu', 'No Education found.');
        } elseif ($experiences->isEmpty()) {
            // If experiences is empty, handle it here
            return view('admin.dashboardAdmin', compact('data', 'educations', 'experiences'))
                ->with('messageExp', 'No Experience found.');
        } else {
            // If both educations and experiences are not empty, return the dashboard view
            return view('admin.dashboardAdmin', compact('data', 'educations', 'experiences'));
        }
    }
    
}
