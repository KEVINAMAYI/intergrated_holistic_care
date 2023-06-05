<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    public function index(){

        $courses = Course::all();
        return view('frontend.courses',compact('courses'));
    }
}
