<?php

namespace App\Http\Controllers;
use App\Models\About;

use Illuminate\Http\Request;

class aboutController extends Controller
{
    // Display a listing of the resource.
    public function displayAbout()
    {
        $about = About::all();
        return view('posts.index', compact('posts'));
    }

    // Show the form for creating a new resource.
    public function createAbout()
    {
        return back()->with('successAbout','No add Data');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validateAbout([
            'title' => 'required',
            'content' => 'required',
        ]);

        About::create($request->all());

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    // Display the specified resource.
    public function showAbout(About $about)
    {
        return view('posts.show', compact('post'));
    }

    // Show the form for editing the specified resource.
    public function edit(About $about)
    {
        return view('posts.edit', compact('post'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $about->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(About $about)
    {
        $about->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
