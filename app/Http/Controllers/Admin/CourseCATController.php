<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseCATRequest;
use App\Models\ClosedQuestion;
use App\Models\CourseCAT;
use App\Models\OpenQuestion;
use Illuminate\Http\Request;

class CourseCATController extends Controller
{
    public function store(StoreCourseCATRequest $request)
    {
        CourseCAT::create($request->validated());
        session()->flash('message', 'CAT Created Successfully');
        return redirect()->back();
    }


    public function destroy(CourseCAT $course_cat)
    {

        OpenQuestion::where('question_label', $course_cat->name)->delete();
        ClosedQuestion::where('question_label', $course_cat->name)->delete();
        $course_cat->delete();

        session()->flash('message', 'CAT Deleted Successfully');
        return redirect()->back();

    }

}
