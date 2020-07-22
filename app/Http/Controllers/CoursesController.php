<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the input of the instructor
        $this->validate($request, [
            'title' => ['required', 'unique:courses', 'max:255'],
            'language' => 'required',
            'game' => 'required',
        ]);

        // Create Course
        $course = new Course;
        $course->title = $request->input('title');
        $course->storageName = $request->input('title');
        $course->description = '';
        $course->user_id = Auth::id();
        $course->language = $request->input('language');
        $course->game = $request->input('game');
        $course->status = 'inprogress';
        $course->price = 0;
        $course->sale_price = 0;
        $course->save();

        // create the first and undeletable section "introduction" for the course
        $section = new Section;
        $section->name = "Introduction";
        $section->course_id = $course->id;
        $section->position = 1;
        $section->save();


        return redirect('/instructor/edit/' . $course->id . '/general')->with('success', 'You succesfully created a new Course!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the input of the instructor
        $this->validate($request, [
            'title' => ['required', 'unique:courses', 'max:255'],
            'language' => 'required',
            'game' => 'required',
        ]);

        // Update Course
        $course = Course::find($id);
        $course->title = $request->input('title');
        $course->language = $request->input('language');
        $course->game = $request->input('game');
        $course->save();

        return redirect('/instructor/edit/' . $course->id . '/general')->with('success', 'Course Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        Storage::deleteDirectory('courses/' . $course->status . '/' . $course->storageName);
        foreach ($course->sections as $section) {
            foreach ($section->lectures as $lecture) {
                $lecture->delete();
            }
            $section->delete();
        }
        $course->delete();
        return redirect('/instructor/mycourses/')->with('success', 'Course Removed');
    }

    public function changeImage(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|max:1999|required',
        ]);

        if($request->hasFile('image')){
            // get the coursename
            $course = Course::find($id);

            // delete old image if exists
            if(!empty($course->imagePath)){
                Storage::delete('/public/courses/' . $course->status . '/' . $course->storageName . '/' . $course->imagePath);
            }

            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            // store the file in the course folder
            $destinationPath = 'public/courses/' . $course->status . '/' . $course->title ;

            $path = $request->file('image')->storeAs($destinationPath, $fileNameToStore);

            $course->imagePath = $fileNameToStore;

            $course->save();
        }

        return redirect('/instructor/edit/' . $course->id . '/general')->with('success', 'Course Image Changed');
    }

    public function editPrice(request $request ,$id)
    {
        $course = Course::find($id);

        $course->price = $request->input('price');

        $course->save();

        return redirect('/instructor/edit/' . $id . '/pricing')->with('success', 'Course Price Changed');
    }

    public function submitCourse($id)
    {
        $course = Course::find($id);

        $course->status = 'pending';

        Storage::move('/public/courses/inprogress/' . $course->storageName, '/public/courses/pending/' . $course->storageName, $overwrite = true);

        $course->save();

        return redirect('instructor/mycourses')->with('success', 'Course submitted succesfully');
    }
}
