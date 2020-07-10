<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Lecture;
use App\Section;
use App\Course;
use Carbon\Carbon;

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

            // set video duration
            $getID3 = new \getID3;
            $file = $getID3->analyze($request->file('lectureVideo'));
            $duration = date('H:i:s', $file['playtime_seconds']);
            $lecture->video_duration = $duration;

            // add video duration to course duration
            $lduration = Carbon::createFromFormat('H:i:s', $duration);
            $currentCourseDuration = Carbon::createFromFormat('H:i:s', $course->course_duration);
            $course->course_duration = $currentCourseDuration->addSeconds($lduration->secondsSinceMidnight());
            $course->save();
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

    public function rename(Request $request, $lectureId, $courseId)
    {
        // validate the input of the instructor
        $this->validate($request, [
            'lectureName' => ['required', 'max:255'],
        ]);

        $lecture = Lecture::find($lectureId);
        $lecture->name = $request->input('lectureName');
        $lecture->save();

        return redirect('/instructor/edit/' . $courseId . '/lectures');
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

        // delete video in storage if exists and substract course duration
        if(isset($lecture->videopath) && !empty($lecture->videopath)){
            Storage::delete( 'courses/' . $course->status . '/' . $course->storageName . '/' . $lecture->videopath);

            $lduration = Carbon::createFromFormat('H:i:s', $lecture->video_duration);
            $currentCourseDuration = Carbon::createFromFormat('H:i:s', $course->course_duration);
            $course->course_duration = $currentCourseDuration->subSeconds($lduration->secondsSinceMidnight());
            $course->save();
        }

        $lecture->delete();

        return redirect('/instructor/edit/' . $section->course_id . '/lectures')->with('success', 'Lecture Removed');
    }

}
