<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupUser;


class DetailGroupController extends Controller
{
    public function groupDetailView(string $slug){
        return view('FE.groupDetail', [
            "group" => Group::where('slug', $slug)->first()
            "member" => GroupUser::
        ]);
    }
}
