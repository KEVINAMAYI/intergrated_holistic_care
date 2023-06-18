<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public  function  index()
    {
        $courses_count = Course::count();
        $students_count = User::where('role_id',1)->count();
        return view('admin.index',compact('courses_count','students_count'));
    }

}
