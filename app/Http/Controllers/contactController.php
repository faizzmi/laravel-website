<?php

namespace App\Http\Controllers;
use App\Models\Contacts;
use Session;

use Illuminate\Http\Request;

class contactController extends Controller
{
    public function createContact() {
        return view('admin.createContact');
    }

    public function storeContact(Request $request) {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        $userId = Session::get('loginId');

        $contact = new Contacts();
        $contact->user_id = $userId;
        $contact->name = $request->name;
        $contact->link = $request->link;
        $res = $contact->save();

        if($res){
            return redirect('dashboard')->with('successC','Your contact edded succesfully');
        }else{
            return redirect('dashboard')->with('errorC','Something wrong');
        }
    }

    public function editContact(Contacts $contact) {
        return view('admin.editContact', compact('contact'));
    }

    public function updateContact(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        $userId = Session::get('loginId');
        
        $contact = Contacts::findOrFail($id);

        $contact->user_id = $userId;
        $contact->name = $request->name;
        $contact->link = $request->link;
        $res = $contact->save();

        if($res){
            return redirect('dashboard')->with('successC','Your contact edded succesfully');
        }else{
            return redirect('dashboard')->with('errorC','Something wrong');
        }

        if($res){
            return redirect('dashboard')->with('successC','Your contact edited succesfully');
        }else{
            return redirect('dashboard')->with('errorC','Something wrong');
        }
    }

    public function destroyContact(Contacts $contact)
    {
        $contact->delete();

        return redirect("dashboard")->with('successC', 'Contact deleted successfully.');
    }
}
