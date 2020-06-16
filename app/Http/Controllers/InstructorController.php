<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
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
        // check if user is logged in and an instructor
        $this->middleware(['auth','verified']);
        $this->middleware('isInstructor')->except('becomeInstructor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function becomeInstructor()
    {
        $user = Auth::user();
        $user->instructor = 1;
        $user->save();

        return redirect('/instructor');
    }

    public function instructor()
    {
        return view('instructor');
    }

    public function myCourses()
    {
        // $user_id = auth()->user()->id;
        // $user = User::find($user_id)->paginate();
        $courses = Course::where('user_id', Auth::id())
                        ->orderBy('updated_at', 'desc')
                        ->paginate(3);

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

    public function editCourse($id)
    {
        $course = Course::find($id);
        // check if the guy who wants to edit a course is the author of the course and check if course exists
        if( $course != NULL && $course->user_id == Auth::id()){
            return view('instructor.editCourse')->with('course', $course);
        }else{
            // if somebody tries to edit a course he doesnt own he gets redirected to the mycourses page
            return redirect('/instructor/mycourses');
        }
    }


}
