<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Educations;
use Session;

class educationController extends Controller
{
    public function index()
    {
        $educations = Educations::all();
        return view('admin.dashboardAdmin', compact('educations'));
    }

    public function createEdu()
    {
        return view('admin.createEdu');
    }

    public function storeEdu(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'education_name' => 'required|string',
            'place' => 'required|string',
        ]);
        if (Session::has('loginId')) {
            $userId = Session::get('loginId');
        }

        $edu = new Educations();
        $edu->user_id = $userId;
        $edu->from_date = $request->from_date;
        $edu->to_date = $request->to_date;
        $edu->education_name = $request->education_name;
        $edu->place = $request->place;
        $edu->description = $request->description;
        
        $res = $edu->save();
        if($res){
            return redirect("/dashboard")->with('successEdu','Education record created successfully.');
        }else{
            return back()->with('errorEdu','Something wrong');
        }
    }

    public function editEdu(Educations $education)
    {
        return view('admin.editEdu', compact('education'));
    }

    public function updateEdu(Request $request, $id)
    {
        $request->validate([
            'from_date' => 'required|date',
            'education_name' => 'required|string',
            'place' => 'required|string',
        ]);

        $edu = Educations::findOrFail($id);

        $edu->from_date = $request->from_date;
        $edu->to_date = $request->to_date;
        $edu->education_name = $request->education_name;
        $edu->place = $request->place;
        $edu->description = $request->description;

        $res = $edu->save();

        // Handle the result of the save operation
        if ($res) {
            // Successfully updated, redirect with success message
            return redirect('dashboard')->with('successEdu', 'Education record updated successfully.');
        } else {
            // Handle update failure, redirect back with error message
            return redirect('dashboard')->with('errorEdu', 'Failed to update education record.');
        }
    }

    public function destroyEdu(Educations $education)
    {
        $education->delete();

        return redirect("/dashboard")->with('successEdu', 'Education record deleted successfully.');
    }
}
