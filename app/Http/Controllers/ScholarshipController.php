<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;

class ScholarshipController extends Controller
{
    public function index(){
        return view('FE.scholarship', [
            'scholarships' => Scholarship::orderBy('updated_at', 'desc')->get()
        ]);
    }
}
