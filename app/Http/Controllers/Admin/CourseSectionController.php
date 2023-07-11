<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseSectionController extends Controller
{

    public function index($courseID){

        $course = Course::with(['sections' => ['lectures']])->find($courseID);
        return view('admin.course_sections.index',compact('course'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSectionRequest $request)
    {
        Section::create($request->validated());
        Session::flash('message','Course Section created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Section $course_section)
    {
        return response()->json([
            'course_section' => $course_section
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreSectionRequest $request, Section $course_section)
    {
        $course_section->update($request->validated());
        Session::flash('message','Course Section Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Section $course_section)
    {
        $course_section->delete();
        Session::flash('message','Course Section Deleted successfully');
        return redirect()->back();
    }
}
