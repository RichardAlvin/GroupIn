<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function groupView(){
        return view('FE.group', [
            "groups" => Group::orderBy('created_at')->simplePaginate(10)
        ]);
    }

    public function groupCreate(Request $request){
        $request->validate([
            'name' => 'required|string|max:250',
            'description' => 'required|string',
            'slot' => 'required|numeric',
        ]);

        Group::create([
            'name' => $request->name,
            'description' => $request->description,
            'slot' => $request->slot
        ]);

        return redirect('/group?Group=Own')
        ->withSuccess('You have successfully create new group!');
    }
}
