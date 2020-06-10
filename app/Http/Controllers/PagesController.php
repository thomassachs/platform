<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function coursePage($courseName)
    {
        return view('course')->with('courseName', $courseName);
    }

    
}
