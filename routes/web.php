<?php

use App\Http\Controllers\DashController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\StudentController;

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



//frontend
Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about',[AboutController::class,'index'])->name('about.index');
Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
Route::get('/services',[ServicesController::class,'index'])->name('services.index');

//backend
Route::middleware(['admin'])->group(function (){
    Route::get('/dashboard',[DashController::class,'index'])->name('dashboard.index');
    Route::get('/students',[StudentController::class,'index'])->name('students.index');
});

//auth
Auth::routes();


