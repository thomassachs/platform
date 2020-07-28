<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class PagesController extends Controller
{
    public function coursePage($courseStorageName)
    {
        $course = Course::firstWhere('storageName', $courseStorageName);

        return view('course')->with('course', $course);
    }

    public function home()
    {
        $courses = Course::where('status', 'approved')->get();

        return view('index')->with('courses', $courses);
    }


}
