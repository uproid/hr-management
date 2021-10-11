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
    return view("welcome");
});


/*
 * API Routes
 * Here is where we can register routes for ons API
 */
//
//Route::prefix('alive')->group(function () {
//    Route::prefix('employee')->group(function () {
//        Route::get("/", [EmployeeController::class, 'employee']);
//        Route::get("/{id}", [EmployeeController::class, 'employee']);
//    });
//
//    Route::prefix('jobs')->group(function () {
//        Route::get("/", [JobController::class, 'job']);
//        Route::get("/{id}", [JobController::class, 'job']);
//        Route::get("/max_salary/{max_price}", [JobController::class, 'jobMaxSalary']);
//        Route::get("/min_salary/{min_price}", [JobController::class, 'jobMinSalary']);
//    });
//
//    Route::prefix('departments')->group(function () {
//        Route::get("/", [DepartmentController::class, 'department']);
//        Route::get("/{id}", [DepartmentController::class, 'department']);
//    });
//});
