<?php

namespace App\Http\Controllers;
use App\Models\Skill;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class skillController extends Controller
{

public function destroy($id) {
    try {
        $skill = Skill::findOrFail($id);
        $skill->delete();
        return redirect('dashboard/project')->with('successSkill', 'Skill deleted successfully');
    } catch (ModelNotFoundException $e) {
        return redirect('dashboard/project')->with('errorSkill', 'Skill not found');
    } catch (\Exception $e) {
        return redirect('dashboard/project')->with('errorSkill', 'An error occurred while deleting the skill');
    }
}

    
    
}
