<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;

class TrainingController extends Controller
{
    public function index(){
        return view('FE.training', [
            'trainings' => Training::orderBy('updated_at', 'desc')->get()
        ]);
    }
}
