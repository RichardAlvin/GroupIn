<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\PendingMemberGroup;
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
        $pendingMember = PendingMemberGroup::with('user')->where('group_id', $group->id)->get();
        return view('FE.groupDetail', [
            "group" => $group,
            "members" => GroupUser::with('user')->where('group_id', $group->id)->get(),
            "isOwner" => $isOwner->isOwner,
            "pendingMembers" => $pendingMember
        ]);
    }

    public function joinGroup(Request $request, string $slug){
        $group = Group::where('slug', $slug)->first();

        //check the group is open or closed
        if(!$group->IsOpen){
            return back();
        }

        // $userId = Auth::id();
        //check the user already join the group
        $alreadyJoin = GroupUser::where('group_id', $group->id)
                   ->where('user_id', $request->user_id)
                   ->exists();
        if($alreadyJoin){
            return back();
        }

        $group->curr_slot += 1;
        $group->save();

        GroupUser::create([
            'group_id' => $group->id,
            'user_id' => $request->user_id,
            'IsOwner' => false,
            'IsEdit' => false,
            'IsView' => true
        ]);

        //delete pendingMember
        $pendingMember = PendingMemberGroup::where('group_id', $group->id)->where('user_id', $request->user_id)->first();
        $pendingMember->delete();

        return redirect('/detail-group/'.$group->slug)
        ->withSuccess('Pending Member succesfull join group!');
    }
}
