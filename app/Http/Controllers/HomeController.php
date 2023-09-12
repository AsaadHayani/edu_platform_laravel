<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tutorial;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(Course $courses, Tutorial $tutorials, User $users)
  {
    $courses = Course::all();
    $tutorials = Tutorial::all();
    $users = User::all();
    return view('home', [
      'courses' => $courses,
      'tutorials' => $tutorials,
      'users' => $users,
    ]);
  }
}
