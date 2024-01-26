<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupUser;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function groupView(Request $request){
        $groupQuery = $request->query('Group');

        if($groupQuery == "Own"){
            $userId = Auth::id();
            $groups = GroupUser::with('group')->where('user_id', $userId)->simplePaginate(10);
            $isPublic = false;
        }else {
            $groups = Group::orderBy('created_at')->simplePaginate(10);
            $isPublic = true;
        }

        return view('FE.group', [
            "groups" => $groups,
            "isPublic" => $isPublic
        ]);
    }

    public function groupCreate(Request $request){
        $request->validate([
            'name' => 'required|string|max:250',
            'description' => 'required|string',
            'slot' => 'required|numeric',
        ]);

        if($request->IsOpen == "on") {
            $IsOpen = true;
        }else {
            $IsOpen = false;
        }

        $group = Group::create([
            'name' => $request->name,
            'description' => $request->description,
            'slot' => $request->slot,
            'IsOpen' => $IsOpen
        ]);

        $userId = Auth::id();
        GroupUser::create([
            'group_id' => $group->id,
            'user_id' => $userId,
            'IsOwner' => true,
            'IsEdit' => true,
            'IsView' => true
        ]);

        return redirect('/group?Group=Own')
        ->withSuccess('You have successfully create new group!');
    }
}
