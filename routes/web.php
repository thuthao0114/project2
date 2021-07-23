<?php

use App\Http\Controllers\MinistryController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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
// dang nhap
Route::get('/',
[StudentController::class,'login']
);
Route::post('/home',
[StudentController::class,'store']
);

// trang home
Route::get('/home',
[StudentController::class,'index']
);




