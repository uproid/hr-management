<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToombaApi\EmployeeController;
use App\Http\Controllers\ToombaApi\JobController;
use App\Http\Controllers\ToombaApi\DepartmentController;
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

Route::get("/",function (){
    return view("frontend.index");
});

