<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseLectureController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreLectureRequest $request)
    {

        $file = $request->lecture_content;
        $destination_path = public_path('/course_lectures/');
        $file_name = "lecture-" . time() . '-' . $file->getClientOriginalName();
        $file->move($destination_path, $file_name);

        Lecture::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'section_id' => $request->input('section_id'),
            'url' => $file_name
        ]);

        return response()->json([
            'message' => 'Lecture Created successfully'
        ]);

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Lecture $course_lecture)
    {
        return response()->json([
            'course_lecture' => $course_lecture
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateLectureRequest $request, Lecture $course_lecture)
    {
        $file = $request->lecture_content;
        $destination_path = public_path('/course_lectures/');
        $file_name = "lecture-" . time() . '-' . $file->getClientOriginalName();
        $file->move($destination_path, $file_name);

        $course_lecture->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'url' => $file_name
        ]);

        return response()->json([
            'message' => 'Lecture Updated successfully'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Lecture $course_lecture)
    {
        $course_lecture->delete();
        Session::flash('message','Course Lecture Deleted successfully');
        return redirect()->back();
    }
}
