<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DescriptionItem;

class DescriptionItemsController extends Controller
{
    public function addRequirement(request $request, $id)
    {
        // validate the input of the instructor
        $this->validate($request, [
            'requirement' => ['required', 'max:255'],
        ]);

        $descriptionItem = new DescriptionItem;

        $descriptionItem->course_id = $id;
        $descriptionItem->type = 'requirement';
        $descriptionItem->content = $request->input('requirement');
        $descriptionItem->save();

        return redirect('/instructor/edit/' . $id . '/description')->with('success', 'You succesfully added a new Requirement!');
    }

    public function addLearnGoal(request $request, $id)
    {
        // validate the input of the instructor
        $this->validate($request, [
            'learnGoal' => ['required', 'max:255'],
        ]);

        $descriptionItem = new DescriptionItem;

        $descriptionItem->course_id = $id;
        $descriptionItem->type = 'learnGoal';
        $descriptionItem->content = $request->input('learnGoal');
        $descriptionItem->save();

        return redirect('/instructor/edit/' . $id . '/description')->with('success', 'You succesfully added a new learn goal!');
    }
}
