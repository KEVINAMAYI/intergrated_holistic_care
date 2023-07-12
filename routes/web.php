<?php

use App\Http\Controllers\Admin\CourseLectureController;
use App\Http\Controllers\Admin\CourseSectionController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\StudentEnrolledCoursesController;
use App\Http\Controllers\Student\StudentFinancesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\StudentCourseController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::view('/', 'frontend.home')->name('home.index');
Route::view('/home', 'frontend.home')->name('home');
Route::view('/about', 'frontend.about')->name('about.index');
Route::view('/contact', 'frontend.contact')->name('contact.index');
Route::view('/services', 'frontend.services')->name('services.index');


Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'student'],function (){
        Route::get('/course-progress/{lecture}', [StudentCourseController::class, 'updateCourseProgress'])->name('update-course-progress');
        Route::get('/student-courses', [StudentCourseController::class, 'index'])->name('student-courses.index');
        Route::get('/take-lessons/{course}', [StudentCourseController::class, 'takeLessons'])->name('take-lessons');
        Route::get('/make-course-payment/{course}', [StudentCourseController::class, 'makeCoursePayment'])->name('make-course-payment');
        Route::get('/get-section-questions/{section_id}', [StudentCourseController::class, 'getSectionQuestions'])->name('get-section-question');
        Route::post('/store-user-results', [StudentCourseController::class, 'storeUserResults'])->name('store-user-results');
        Route::get('/student-enrolled-courses',[StudentEnrolledCoursesController::class,'index'])->name('student-enrolled-courses.index');
        Route::get('/student-finances',[StudentFinancesController::class,'index'])->name('student-finances.index');
        Route::resource('student-profile',ProfileController::class)->only(['index','update']);
    });

    Route::group(['middleware' => 'admin','prefix' => 'admin'],function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::post('/activate-student-courses/{student}', [StudentController::class, 'activateStudentCourses'])->name('activate_student_courses');
        Route::resource('students', StudentController::class);
        Route::resource('courses', CourseController::class);
        Route::get('course/{course_id}/course-sections/',[CourseSectionController::class,'index'])->name('course-sections.index');
        Route::resource('course-sections', CourseSectionController::class)->except(['index']);
        Route::resource('course-lectures', CourseLectureController::class);
        Route::resource('course-questions', QuestionController::class);
    });
});

Auth::routes();



