<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;

class SectionsController extends Controller
{
    public function update(Request $request, $id)
    {
        // validate the input of the instructor
        $this->validate($request, [
            'sectionName' => ['required', 'max:255'],
        ]);

        // Create Section
        $section = new Section;
        $section->name = $request->input('sectionName');
        $section->position = 1;
        $section->course_id = $id;

        $section->save();

        return redirect('/instructor/edit/' . $id);
    }
}
