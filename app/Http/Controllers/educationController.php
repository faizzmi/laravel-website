<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Educations;

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
        $edu = new Educations();
        $edu->from_date = $request->from_date;
        $edu->to_date = $request->to_date;
        $edu->education_name = $request->education_name;
        $edu->place = $request->place;
        $edu->description = $request->description;
        $res = $edu->save();
        if($res){
            return redirect("/dashboard")->with('success','Education record created successfully.');
        }else{
            return back()->with('error','Something wrong');
        }
    }

    public function show(Educations $education)
    {
        return view('educations.show', compact('education'));
    }

    public function edit(Educations $education)
    {
        return view('educations.edit', compact('education'));
    }

    public function update(Request $request, Educations $education)
    {
        $request->validate([
            'from_date' => 'required|date',
            'education_name' => 'required|string',
            'place' => 'required|string',
        ]);

        $education->update($request->all());

        return redirect()->route('educations.index')
            ->with('success', 'Education record updated successfully.');
    }

    public function destroy(Educations $education)
    {
        $education->delete();

        return redirect()->route('educations.index')
            ->with('success', 'Education record deleted successfully.');
    }
}
