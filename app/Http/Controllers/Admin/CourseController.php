<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasses\ManageImages;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index',compact('courses'));
    }



    public function store(StoreCourseRequest $request)
    {

        $course_image_url = ManageImages::processImage($request->image,1024000, public_path('/images/course_images/'),'course',3,3);
        Course::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'instructor_id' => $request->input('instructor_id'),
            'image_url' => $course_image_url,
            'cost' => '30000',
            'duration' => '3 Months',
        ]);
        Session::flash('message','Course created successfully');
        return redirect()->back();
    }


    public function show(Course $course)
    {
        return response()->json([
            'course' => $course
        ]);
    }



    public function updateCourse(Request $request,Course $course)
    {
        $course_image_url = ManageImages::processImage($request->image,1024000, public_path('/images/course_images/'),'course',3,3);

        //remove old image
        $image_path = public_path('/images/course_images/'.$course->image_url);
        if(file_exists($image_path)){ unlink($image_path); }

        $course->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'instructor_id' => $request->input('instructor_id'),
            'image_url' => $course_image_url,
        ]);

        return response()->json([
            'data' => "Course updated Successful"
        ]);
    }


    public function destroy(Course $course)
    {
        $course->delete();
        Session::flash('message','Course deleted successfully');
        return redirect()->back();
    }
}
