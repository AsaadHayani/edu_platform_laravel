<?php

use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ResumeController;
use App\Http\Controllers\Api\TutorialController;
use App\Http\Controllers\Api\UserController;
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

Route::group(['middleware' => 'auth:sanctum'], function () {

  Route::apiResource('courses', CourseController::class);

  Route::apiResource('tutorials', TutorialController::class);

  Route::apiResource('users', UserController::class);

  Route::apiResource('resume', ResumeController::class);
});
