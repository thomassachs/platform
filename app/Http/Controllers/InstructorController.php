<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function instructor()
    {
        return view('instructor');
    }

    public function myCourses()
    {
        $courses = Course::where('author_id', Auth::id())->get();
        return view('instructor.myCourses')->with('courses', $courses);
    }

    public function createCourse()
    {
        return view('instructor.createCourse');
    }

    public function storeCourse(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        // Create Course
        $course = new Course;
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->save();

        return redirect('/instructor/mycourses')->with('success', 'You succesfully created a new Course!');
    }


}
