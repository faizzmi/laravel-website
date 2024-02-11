<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Educations;
use App\Models\Experience;
use App\Models\Contacts;
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
        $contacts = Contacts::where('user_id', $userId)->get();
    
        // Check if any of the data is empty
        if ($educations->isEmpty() || $experiences->isEmpty() || $contacts->isEmpty()) {
            // Determine which data is empty and set corresponding messages
            $messages = [];
            if ($educations->isEmpty()) {
                $messages['messageEdu'] = 'No Education found.';
            }
            if ($experiences->isEmpty()) {
                $messages['messageExp'] = 'No Experience found.';
            }
            if ($contacts->isEmpty()) {
                $messages['messageC'] = 'No Contact found.';
            }
            
            // Return the view with messages
            return view('admin.dashboardAdmin', compact('data', 'educations', 'experiences', 'contacts'))->with($messages);
        }
    
        // If all data is available, return the dashboard view
        return view('admin.dashboardAdmin', compact('data', 'educations', 'experiences', 'contacts'));
    }
    
}
