<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::post('/create/student', [StudentController::class, 'save']);
Route::post('/login', [StudentController::class, 'login']);
Route::get('/read/students', [StudentController::class, 'list_all']);
Route::get('/read/student/{id}', [StudentController::class, 'listById']);
Route::put('/update/student', [StudentController::class, 'update']);
Route::Delete('/delete/student/{id}', [StudentController::class, 'delete']);