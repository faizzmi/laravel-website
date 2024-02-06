<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Educations;
use Session;

use Illuminate\Http\Request;

class adminDashboardController extends Controller
{
    //
    public function dashboard() {
        $userId = Session::get('loginId');
        $data = User::find($userId);
    
        $educations = Educations::where('user_id', $userId)->get();
    
        return view('admin.dashboardAdmin', compact('data', 'educations'));
    }
    
}
