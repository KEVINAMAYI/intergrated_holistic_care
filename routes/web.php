<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;

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

<<<<<<< HEAD
Route::get('/',[HomeController::class,'index'])->name('home.index');
=======
Route::get('/home',[HomeController::class,'index'])->name('home.index');
>>>>>>> 9192496aa808289d45beaa7f9e78c92bfbd99c27
Route::get('/about',[AboutController::class,'index'])->name('about.index');
Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
Route::get('/services',[ServicesController::class,'index'])->name('services.index');
