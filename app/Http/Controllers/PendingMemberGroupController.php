<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PendingMemberGroup;
use App\Models\Group;

class PendingMemberGroupController extends Controller
{
    public function PendingMember(Request $request){
        $request->validate([
            'message' => 'required|string',
            'link' => 'required|string',
        ]);

        $group = Group::where('id', $request->group_id)->first();

        //check the group is open or closed
        if(!$group->IsOpen){
            return back();
        }

        $userId = Auth::id();
        $pendingGroup = PendingMemberGroup::create([
            'message' => $request->message,
            'link' => $request->link,
            'group_id' => $request->group_id,
            'user_id' => $userId
        ]);

        return redirect('/group?Group=Pending')
        ->withSuccess('Wait for the admin to accept you to the group!');
    }

    public function removePendingMember(Request $request, string $userId) {
        $group = Group::where('id', $request->group_id)->first();
        $deletePendingGroup = PendingMemberGroup::where('group_id', $request->group_id)->where('user_id', $userId)->first();
        $deletePendingGroup->delete();

        $myId = Auth::id();
        if($myId == $userId){
            return redirect('/group?Group=Pending')
            ->withSuccess('You have successfully delete pending group!');
        }else {
            return redirect('/detail-group/'.$group->slug)
            ->withSuccess('You have successfully delete pending group!');
        }
    }
}
