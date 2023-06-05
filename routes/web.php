<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\StudentCourseController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ServicesController;
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


//user can access when not logged in
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/services', [ServicesController::class, 'index'])->name('services.index');

//user must be logged in
Route::middleware(['auth'])->group(function () {

    //normal users
    Route::get('/student-courses', [StudentCourseController::class, 'index'])->name('student-courses.index');

    //Admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::post('/update-course/{course}', [CourseController::class, 'updateCourse']);
        Route::resource('students', StudentController::class);
        Route::resource('courses', CourseController::class);
    });
});

Auth::routes();



