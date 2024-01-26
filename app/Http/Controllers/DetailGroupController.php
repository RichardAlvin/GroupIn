<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupUser;


class DetailGroupController extends Controller
{
    public function groupDetailView(string $slug){
        $group = Group::where('slug', $slug)->first();
        return view('FE.groupDetail', [
            "group" => $group,
            "members" => GroupUser::with('user')->where('group_id', $group->id)->get()
        ]);
    }
}
