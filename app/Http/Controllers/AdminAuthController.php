<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class AdminAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function registration(){
        return view("auth.registration");
    }

    public function editUser(User $user){
        return view("admin.editUser",compact("user"));
    }

    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success','You have registered succesfully');
        }else{
            return back()->with('error','Something wrong');
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }else{
                return back()->with('error','Wrong Password.');
            }
        }else{
            return back()->with('error','This email is not registered.');
        }
    }

    public function updateUser(Request $request){
        $request->validate([
            'name' => 'required|string',
            'jobTitle' => 'nullable|string',
            'about' => 'nullable|string',
        ]);
        $userId = Session::get('loginId');
        $user = User::where('id', $userId)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->jobTitle = $request->jobTitle;
        $user->about = $request->about;

        $res = $user->save();

        if ($res) {
            return redirect('dashboard')->with('successAbout', 'Education record updated successfully.');
        } else {
            return redirect('dashboard')->with('errorAbout', 'Failed to update education record.');
        }
    }

    public function logoutUser(){
        if (Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
