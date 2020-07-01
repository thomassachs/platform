<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Lecture;
use App\Section;
use App\Course;

class LecturesController extends Controller
{

    public function store(Request $request, $sectionId, $courseId)
    {

        $this->validate($request, [
            'lectureName' => ['required', 'max:255'],
            'lectureVideo' => 'nullable|mimes:mp4|max:19999',
        ]);


        $section = Section::find($sectionId);

        // handle videoupload
        if($request->hasFile('lectureVideo')){
            // get the coursename
            $course = Course::find($section->course_id);

            // Get filename with the extension
            $filenameWithExt = $request->file('lectureVideo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('lectureVideo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            // store the file in the course folder
            $destinationPath = 'public/courses/' . $course->status . '/' . $course->storageName ;

            $path = $request->file('lectureVideo')->storeAs($destinationPath, $fileNameToStore);
        }

        // create Lecture
        $lecture = new Lecture;
        $lecture->name = $request->input('lectureName');
        $lecture->section_id = $sectionId;
        $lecture->position = 1 + count($section->lectures);
        $lecture->type = 'video';

        if(isset($destinationPath) && isset($fileNameToStore)){
            $lecture->videopath = $fileNameToStore;
        }else{
            $lecture->videopath = "";
        }



        $lecture->save();

        return redirect('/instructor/edit/' . $courseId . '/lectures')->with('success', 'lecture created succesfully');
    }

    public function moveUp($lectureId)
    {

        $currentLecture = Lecture::find($lectureId);

        $section = Section::find($currentLecture->section_id);

        // set the section with higher position one position down
        foreach ($section->lectures as $otherLecture) {
            if($otherLecture->position == $currentLecture->position -1){
                $otherLecture->position = $otherLecture->position + 1;
                $otherLecture->save();
            }
        }


        $currentLecture->position = $currentLecture->position - 1;

        $currentLecture->save();

        return redirect('/instructor/edit/' . $section->course_id . '/lectures')->with('success', 'Lecture moved upwards' );
    }

    public function moveDown($lectureId)
    {

        $currentLecture = Lecture::find($lectureId);

        $section = Section::find($currentLecture->section_id);

        // set the section with higher position one position down
        foreach ($section->lectures as $otherLecture) {
            if($otherLecture->position == $currentLecture->position + 1){
                $otherLecture->position = $otherLecture->position - 1;
                $otherLecture->save();
            }
        }


        $currentLecture->position = $currentLecture->position + 1;

        $currentLecture->save();

        return redirect('/instructor/edit/' . $section->course_id . '/lectures')->with('success', 'Lecture moved downwards' );
    }

    public function destroy($id)
    {
        $lecture = Lecture::find($id);

        $section = Section::find($lecture->section_id);

        $course = Course::find($section->course_id);

        // set sections with higher position one position down
        foreach ($section->lectures as $otherLecture) {
            if($otherLecture->position > $lecture->position){
                $otherLecture->position = $otherLecture->position -1;
                $otherLecture->save();
            }
        }

        // delete video in storage if exists
        if(isset($lecture->videopath) && !empty($lecture->videopath)){
            Storage::delete( 'courses/' . $course->status . '/' . $course->storageName . '/' . $lecture->videopath);
        }

        $lecture->delete();

        return redirect('/instructor/edit/' . $section->course_id . '/lectures')->with('success', 'Lecture Removed');
    }

}
