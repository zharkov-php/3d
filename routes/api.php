<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\WorkHistoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees', [EmployeeController::class, 'index']);

Route::get('/machines', [MachineController::class, 'index']);

Route::post('/assign/{employee}/{machine}', [WorkController::class, 'assignMachineToEmployee']);
Route::post('/unassign/{employee}/{machine}', [WorkController::class, 'unassignMachineFromEmployee']);

Route::get('/employee-status/{employee}', [EmployeeController::class, 'getEmployeeStatus']);
Route::get('/machine-status/{machine}', [MachineController::class, 'getMachineStatus']);

Route::get('/history/{type}/{id}', [WorkHistoryController::class, 'getHistory']);

