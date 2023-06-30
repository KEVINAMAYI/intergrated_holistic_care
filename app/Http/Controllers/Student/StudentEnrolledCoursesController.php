<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class StudentEnrolledCoursesController extends Controller
{
    public function index(){
        $student_enrollments = Enrollment::where('student_id',auth()->user()->id)->get()->toArray();
        $student_courses = Course::whereIn('id',array_column($student_enrollments,'course_id'))->get();
        return view('student.courses',compact('student_courses'));
    }
}
