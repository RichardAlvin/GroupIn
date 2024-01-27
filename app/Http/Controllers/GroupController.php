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

        $userId = Auth::id();
        if($groupQuery == "Own"){
            $groups = GroupUser::with('group')->where('user_id', $userId)->simplePaginate(10);
            $isPublic = false;
        }else {
            $userJoinedGroups = GroupUser::where('user_id', $userId)->pluck('group_id')->toArray();
            $groups = Group::orderBy('created_at')
                ->whereNotIn('id', $userJoinedGroups)
                ->simplePaginate(10);
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
            'curr_slot' => 1,
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

    public function groupUpdate(Request $request, string $slug){
        $request->validate([
            'name' => 'required|string|max:250',
            'description' => 'required|string',
            'slot' => 'required|numeric',
        ]);

        $group = Group::where('slug', $slug)->first();
        if (!$group) {
            return response()->json(['message' => 'Not found'], 404);
        }

        if($request->IsOpen == "on") {
            $IsOpen = true;
        }else {
            $IsOpen = false;
        }

        $group->update([
            'name' => request('name'),
            'description' => request('description'),
            'slot' => request('slot'),
            'IsOpen' => $IsOpen
        ]);
        return redirect('/detail-group/'.$group->slug)
        ->withSuccess('You have successfully edit group!');
    }

    public function groupDelete(string $slug){
        $group = Group::where('slug',$slug)->first();
        //delete all user 
        GroupUser::where('group_id', $group->id)->delete();
        $group->delete();
        return redirect('/group?Group=Own')
        ->withSuccess('You have successfully delete group!');
    }
}
