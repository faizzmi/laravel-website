<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Session;

class expController extends Controller
{
    public function createExp() {
        return view('admin.createExp');
    }

    public function storeExp(Request $request) {
        $request->validate([
            'expName' => 'required',
            'from_date_exp' => 'required|date',
            'expPosition' => 'required',
            'expPlace' => 'required',
        ]);

        $userId = Session::get('loginId');

        $experience = new Experience();
        $experience->user_id = $userId;
        $experience->expName = $request->expName;
        $experience->from_date_exp = $request->from_date_exp;
        $experience->to_date_exp = $request->to_date_exp;
        $experience->expPosition = $request->expPosition;
        $experience->expPlace = $request->expPlace;
        $experience->descriptionExp = $request->descriptionExp;
        $res = $experience->save();

        if($res){
            return redirect('dashboard')->with('successExp','Your experience edded succesfully');
        }else{
            return redirect('dashboard')->with('errorExp','Something wrong');
        }
    }

    public function editExp(Experience $experience) {
        return view('admin.editExp', compact('experience'));
    }

    public function updateExp(Request $request, $id) {
        $request->validate([
            'expName' => 'required',
            'from_date_exp' => 'required|date',
            'expPosition' => 'required',
            'expPlace' => 'required',
        ]);

        $userId = Session::get('loginId');

        $experience = Experience::find($id);

        $experience->user_id = $userId;
        $experience->expName = $request->expName;
        $experience->from_date_exp = $request->from_date_exp;
        $experience->to_date_exp = $request->to_date_exp;
        $experience->expPosition = $request->expPosition;
        $experience->expPlace = $request->expPlace;
        $experience->descriptionExp = $request->descriptionExp;
        $res = $experience->save();

        if($res){
            return redirect('dashboard')->with('successExp','Your experience edited succesfully');
        }else{
            return redirect('dashboard')->with('errorExp','Something wrong');
        }
    }

    public function destroyExp(Experience $experience)
    {
        $experience->delete();

        return redirect("dashboard")->with('successExp', 'Experience deleted successfully.');
    }
    
}
