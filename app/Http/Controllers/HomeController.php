<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use App\Models\Training;
use App\Models\Competition;

class HomeController extends Controller
{
    public function index(){
        return view('FE.home', [
            'scholarships' => Scholarship::orderBy('updated_at', 'desc')->take(4)->get(),
            'trainings' => Training::orderBy('updated_at', 'desc')->take(4)->get(),
            'competitions' => Competition::orderBy('updated_at', 'desc')->take(4)->get()
        ]);
    }
}
