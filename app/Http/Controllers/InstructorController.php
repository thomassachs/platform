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
        return view('instructor.dashboard');
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
        //check if instructor already has 5 courses with status "inprogress"
        $user = Auth::user();
        $coursesInProgress = count($user->courses->where('status', '=', 'inprogress'));

        return view('instructor.createCourse')->with('coursesInProgress', $coursesInProgress);
    }

    public function previewCourseSale($id)
    {
        $course = Course::find($id);

        // check if the guy who wants to preview a course is the author of the course and check if course exists
        if( $course != NULL && $course->user_id == Auth::id()){
            return view('instructor.inc.previewSale')->with('course', $course);
        }else{
            // if somebody tries to preview a course he doesnt own he gets redirected to the mycourses page
            return redirect('/instructor/mycourses');
        }
    }

    public function previewCourseLearn($id)
    {
        $course = Course::find($id);

        // check if the guy who wants to preview a course is the author of the course and check if course exists
        if( $course != NULL && $course->user_id == Auth::id()){
            return view('instructor.inc.previewLearn')->with('course', $course);
        }else{
            // if somebody tries to preview a course he doesnt own he gets redirected to the mycourses page
            return redirect('/instructor/mycourses');
        }
    }

    public function editGeneral($id)
    {
        $course = Course::find($id);

        // check if the guy who wants to edit a course is the author of the course and check if course exists
        if( $course != NULL && $course->user_id == Auth::id()){
            return view('instructor.editGeneral')->with('course', $course);
        }else{
            // if somebody tries to edit a course he doesnt own he gets redirected to the mycourses page
            return redirect('/instructor/mycourses');
        }

    }

    public function editDescription($id)
    {
        $course = Course::find($id);

        // check if the guy who wants to edit a course is the author of the course and check if course exists
        if( $course != NULL && $course->user_id == Auth::id()){
            return view('instructor.editDescription')->with('course', $course);
        }else{
            // if somebody tries to edit a course he doesnt own he gets redirected to the mycourses page
            return redirect('/instructor/mycourses');
        }

    }

    public function editLectures($id)
    {
        $course = Course::find($id);

        // check if the guy who wants to edit a course is the author of the course and check if course exists
        if( $course != NULL && $course->user_id == Auth::id()){
            return view('instructor.editLectures')->with('course', $course);
        }else{
            // if somebody tries to edit a course he doesnt own he gets redirected to the mycourses page
            return redirect('/instructor/mycourses');
        }
    }

    public function editPrice($id)
    {
        $course = Course::find($id);

        // check if the guy who wants to edit a course is the author of the course and check if course exists
        if( $course != NULL && $course->user_id == Auth::id()){
            return view('instructor.editPrice')->with('course', $course);
        }else{
            // if somebody tries to edit a course he doesnt own he gets redirected to the mycourses page
            return redirect('/instructor/mycourses');
        }
    }

    public function submitCourse($id)
    {
        $course = Course::find($id);

        // check if the guy who wants to edit a course is the author of the course and check if course exists
        if( $course != NULL && $course->user_id == Auth::id()){
            return view('instructor.submitCourse')->with('course', $course);
        }else{
            // if somebody tries to edit a course he doesnt own he gets redirected to the mycourses page
            return redirect('/instructor/mycourses');
        }
    }

    public function analytics()
    {
        return view('instructor.analytics');
    }

    public function reviews()
    {
        return view('instructor.reviews');
    }

    public function earning()
    {
        return view('instructor.earning');
    }

    public function payout()
    {
        return view('instructor.payout');
    }

    public function statements()
    {
        return view('instructor.statements');
    }



}
