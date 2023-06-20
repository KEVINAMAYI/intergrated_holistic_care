<?php

namespace App\Http\Controllers\Admin;

use App\Custom\ManageFiles;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use App\Models\Lecture;
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

        $file_name = ManageFiles::processNonImageFiles($request->lecture_content,public_path('/course_lectures/'),'lecture');
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
        $file_name = ManageFiles::processNonImageFiles($request->lecture_content,public_path('/course_lectures/'),'lecture');
        ManageFiles::removeFile(public_path('/course_lectures/'.$course_lecture->url));

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
