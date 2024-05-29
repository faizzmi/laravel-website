<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Pictures;
use Illuminate\Http\Request;

class picController extends Controller
{
    //
    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:jpg,png,pdf|max:2048',
    //     ]);

    //     $picture = new Pictures();
    //     $picture->project_id = $request->developedYear;
    //     $picture->picture = $request->file;
    //     $res = $picture->save();
        
    //     if($res){
    //         return redirect('dashboard/project/c/create')->with('succesPic','File uploaded successfully!');
    //     }else{
    //         return redirect('dashboard/project/c/create')->with('errorPic','File failed to upload!');
    //     }

        
    // }

    // public function show($filename)
    // {
    //     $url = Pictures::url("uploads/{$filename}");

    //     return view('file.show', ['url' => $url]);
    // }
}
