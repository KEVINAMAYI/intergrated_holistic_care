<?php

namespace App\Http\Controllers\Admin;

use App\Services\FileService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{

    public function __construct(private FileService $fileService)
    {
    }

    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }


    public function store(StoreCourseRequest $request)
    {

        $course_image_url = $this->fileService->processImage($request->image, 1024000, public_path('/images/course_images/'), 'course', 3, 3);
        Course::create($request->validated() + [
                'image_url' => $course_image_url,
                'cost' => '30000',
                'duration' => '3 Months',
            ]);
        Session::flash('message', 'Course created successfully');
        return redirect()->back();
    }


    public function show(Course $course)
    {
        return response()->json([
            'course' => $course
        ]);
    }


    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        if ($request->hasFile('image')) {

            $course_image_url = $this->fileService->processImage($request->image, 1024000, public_path('/images/course_images/'), 'course', 3, 3);
            $this->fileService->removeFile(public_path('/images/course_images/' . $course->image_url));
            $course->update(['image_url' => $course_image_url]);
        }

        session()->flash('message', 'Course Updated Successfully');
        return redirect()->back();
    }


    public function destroy(Course $course)
    {
        $course->delete();
        Session::flash('message', 'Course deleted successfully');
        return redirect()->back();
    }


}
