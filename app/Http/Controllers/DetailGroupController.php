<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupUser;
use Illuminate\Support\Facades\Auth;

class DetailGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function groupDetailView(string $slug){
        $group = Group::where('slug', $slug)->first();
        $userId = Auth::id();
        $isOwner = GroupUser::where('group_id', $group->id)->where('user_id', $userId)->select('IsOwner')->first();
        return view('FE.groupDetail', [
            "group" => $group,
            "members" => GroupUser::with('user')->where('group_id', $group->id)->get(),
            "isOwner" => $isOwner->isOwner
        ]);
    }

    public function joinGroup(string $slug){
        $group = Group::where('slug', $slug)->first();

        //check the group is open or closed
        if(!$group->IsOpen){
            return back();
        }

        $userId = Auth::id();
        //check the user already join the group
        $alreadyJoin = GroupUser::where('group_id', $group->id)
                   ->where('user_id', $userId)
                   ->exists();
        if($alreadyJoin){
            return back();
        }

        $group->curr_slot += 1;
        $group->save();

        GroupUser::create([
            'group_id' => $group->id,
            'user_id' => $userId,
            'IsOwner' => false,
            'IsEdit' => false,
            'IsView' => true
        ]);

        return redirect('/group?Group=Own')
        ->withSuccess('You have successfully join public group!');
    }
}
