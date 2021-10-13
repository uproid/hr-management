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
 * Here is where we can register routes for ToombaAPI
 */

Route::prefix('employee')->group(function () {
    Route::get("/", [EmployeeController::class, 'employees'])->middleware('api_token');
    Route::get("/{id}", [EmployeeController::class, 'employee'])->middleware('api_token');
    Route::post('/', [EmployeeController::class, 'addEmployee'])->middleware('api_token');
    Route::put('/{id}', [EmployeeController::class, 'editEmployee'])->middleware('api_token');
});

Route::prefix('jobs')->group(function () {
    Route::get("/", [JobController::class, 'jobs'])->middleware('api_token');
    Route::get("/{id}", [JobController::class, 'job'])->middleware('api_token');
    Route::get("/max_salary/{max_price}", [JobController::class, 'jobMaxSalary'])->middleware('api_token');
    Route::get("/min_salary/{min_price}", [JobController::class, 'jobMinSalary'])->middleware('api_token');
});

Route::prefix('departments')->group(function () {
    Route::get("/", [DepartmentController::class, 'departments'])->middleware('api_token');
    Route::get("/{id}", [DepartmentController::class, 'department'])->middleware('api_token');
});

