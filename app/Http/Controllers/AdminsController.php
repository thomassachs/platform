<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class AdminsController extends Controller
{
    public function __construct()
    {
        // check if user is admin
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $courses = Course::where('status', 'pending')->get();

        return view('admin.admin')->with('courses', $courses);
    }

    public function showPendingCourses()
    {
        $courses = Course::where('status', 'pending')->get();

        return view('admin.pendingCourses')->with('courses', $courses);
    }
}
