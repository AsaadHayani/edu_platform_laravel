<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\is_doneController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\UserController;
use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::resource('courses', CourseController::class)->middleware(['auth', 'verified']);

Route::resource('tutorials', TutorialController::class)->middleware(['auth', 'verified']);

Route::resource('users', UserController::class)->middleware(['auth', 'verified']);

Route::resource('resume', ResumeController::class)->middleware(['auth', 'verified']);

Route::post('tutorials/{tutorial}', [TutorialController::class, 'is_done'])->name('is_done');

Route::post('courses/{course}', [CourseController::class, 'course_user'])->name('course_user');

Auth::routes();

Route::get('/create-admin', function () {
  $credentials = [
    'email' => 'admin@gmail.com',
    'password' => '12345678',
    'role' => 2
  ];
  if (!Auth::attempt($credentials)) {
    $user = new User();
    $user->name = "Admin";
    $user->email = $credentials['email'];
    $user->password = $credentials['password'];
    $user->role = $credentials['role'];
    $user->save();

    if (Auth::attempt($credentials)) {
      $user = Auth::user();
      $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
      $authorToken = $user->createToken('author-token', ['create', 'update']);
      $basicToken = $user->createToken('basic-token', ['read']);
      return [
        'admin' => $adminToken->plainTextToken,
        'author' => $authorToken->plainTextToken,
        'basic' => $basicToken->plainTextToken,
      ];
    }
  }
});

Route::get('/user/register', [UserController::class, 'register'])->name('user.register');
Route::post('/user/save', [UserController::class, 'save'])->name('user.save');
