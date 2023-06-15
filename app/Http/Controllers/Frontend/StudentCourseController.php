<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('frontend.courses', compact('courses'));
    }

    public function takeLessons(Course $course)
    {
        if(!Gate::allows('access_course',$course->id)){
            abort(403);
        }
        return view('frontend.take_lessons',compact('course'));
    }


    public function makeCoursePayment($courseId)
    {
        if(!Gate::allows('access_course',$courseId)){
            abort(403);
        }
        return view('frontend.student_course_payments',compact('courseId'));
    }
}
