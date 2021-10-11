<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToombaApi\EmployeeController;
use App\Http\Controllers\ToombaApi\JobController;
use App\Http\Controllers\ToombaApi\DepartmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*
 * API Routes
 * Here is where we can register routes for ons API
 */

Route::prefix('employee')->group(function () {
    Route::get("/", [EmployeeController::class, 'employees']);
    Route::get("/{id}", [EmployeeController::class, 'employee']);
    Route::post('/', [EmployeeController::class, 'addEmployee']);
});

Route::prefix('jobs')->group(function () {
    Route::get("/", [JobController::class, 'jobs']);
    Route::get("/{id}", [JobController::class, 'job']);
    Route::get("/max_salary/{max_price}", [JobController::class, 'jobMaxSalary']);
    Route::get("/min_salary/{min_price}", [JobController::class, 'jobMinSalary']);
});

Route::prefix('departments')->group(function () {
    Route::get("/", [DepartmentController::class, 'departments']);
    Route::get("/{id}", [DepartmentController::class, 'department']);
});

