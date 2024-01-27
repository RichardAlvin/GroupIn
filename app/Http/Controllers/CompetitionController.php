<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;

class CompetitionController extends Controller
{
    public function index(){
        return view('FE.competition', [
            'competitions' => Competition::orderBy('updated_at', 'desc')->get()
        ]);
    }
}
