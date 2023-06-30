<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentFinancesController extends Controller
{
    public function index(){
        return view('student.finances');
    }
}
