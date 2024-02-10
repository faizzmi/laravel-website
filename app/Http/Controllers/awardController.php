<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;
use Session;
use App\Models\User;

class awardController extends Controller
{
    public function awardDashboard() {
        $userId = Session::get('loginId');
        $user = User::find($userId);

        $awards = Award::where('user_id', $userId)->get();
    
        if ($awards->isEmpty()) {
            // If $projects is empty, you can handle it here
            return view('admin.awardDashboard', compact('user'))
                ->with('message', 'No Awards found.');
        }
    
        return view('admin.awardDashboard', compact('user', 'awards'));
    }

    public function createAward() {
        return view('admin.createAward');
    }

    public function storeAward(Request $request) {
        $request->validate([
            'awardName' => 'required',
        ]);

        $userId = Session::get('loginId');

        $award = new Award();
        $award->user_id = $userId;
        $award->awardName = $request->awardName;
        $award->award_date = $request->award_date;
        $award->awardDesc = $request->awardDesc;
        $res = $award->save();

        if($res){
            return redirect('dashboard/award')->with('successAw','Your award edded succesfully');
        }else{
            return redirect('dashboard/award')->with('errorAw','Something wrong');
        }
    }

    public function editAward(Award $award) {
        return view('admin.editAward', compact('award'));
    }

    public function updateAward(Request $request, $id) {
        $request->validate([
            'awardName' => 'required',
        ]);

        $userId = Session::get('loginId');
        
        $award = Award::findOrFail($id);

        $award->user_id = $userId;
        $award->awardName = $request->awardName;
        $award->award_date = $request->award_date;
        $award->awardDesc = $request->awardDesc;
        $res = $award->save();

        if($res){
            return redirect('dashboard/award')->with('successAw','Your award edited succesfully');
        }else{
            return redirect('dashboard/award')->with('errorAw','Something wrong');
        }
    }

    public function destroyAward(Award $award)
    {
        $award->delete();

        return redirect("dashboard/award")->with('successAw', 'Award deleted successfully.');
    }
    
}
