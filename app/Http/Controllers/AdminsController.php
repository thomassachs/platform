<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\Storage;

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

    public function approveCourse($id)
    {

        $course = Course::find($id);
        $course->status = 'approved';
        $course->save();
        Storage::move('/public/courses/pending/' . $course->storageName, '/public/courses/approved/' . $course->storageName, $overwrite = true);

        return redirect('/admin/pendingcourses')->with('success', 'Course approved' );
    }
}
