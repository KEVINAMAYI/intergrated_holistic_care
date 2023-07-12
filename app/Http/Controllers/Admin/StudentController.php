<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use App\Services\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function __construct(private CourseService $courseService)
    {

    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $students = User::with('gender', 'education_level')->where('role_id', 1)->get();
        $courses = Course::all();
        return view('admin.students.index', compact('students', 'courses'));
    }


    public function show(User $student)
    {
        $student_courses = $student->courses->pluck('id')->toArray();
        return response()->json([
            'student_courses' => $student_courses
        ]);
    }

    public function destroy(User $student)
    {
        $student->delete();
        Session::flash('message', 'Student deleted successfully');
        return redirect()->back();
    }


    public function activateStudentCourses(Request $request, User $student)
    {
        if (is_null($request->courses)) {
            $student_active_courses = [];
        } else {
            $student_active_courses = array_map('intval', $request->courses);
            $this->courseService->enrollUserToCourses($student_active_courses, $student);
        }

        User::activateCourses($student, $student_active_courses);
        Session::flash('message', 'User Courses activated/deactivated successfully');
        return redirect()->back();
    }



}
