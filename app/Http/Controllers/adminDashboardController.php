<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Educations;
use Illuminate\Support\Facades\Auth;
use Session;

use Illuminate\Http\Request;

class adminDashboardController extends Controller
{
    //
    public function dashboard(){
        $data = array();
        if (Session::has('loginId')) {
            $userId = Session::get('loginId');
            $data = User::find($userId);
            $educations = $data->educations;
            $educations = Educations::all();
        }
        return view('admin.dashboardAdmin', compact('data','educations'));
    }
}
