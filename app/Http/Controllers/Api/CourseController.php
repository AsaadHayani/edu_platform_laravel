<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $courses = Course::latest("updated_at", "desc")->get();
    return response()->json(new CourseCollection($courses), Response::HTTP_OK);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|min:2|max:20',
      'desc' => 'required|min:5|max:50'
    ]);
    $course = Course::create([
      'name' => $validated['name'],
      'desc' => $validated['desc'],
      'user_id' => 1
    ]);
    return new CourseResource($course);
  }

  /**
   * Display the specified resource.
   */
  public function show(Course $course)
  {
    return new CourseResource($course);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateCourseRequest $request, Course $course)
  {
    $course->update($request->all());
    return new CourseResource($course);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Course $course)
  {
    $user = auth()->user();
    if ($user !== null && $user->tokenCan('delete')) {
      $course->delete();
    return response()->json(null, Response::HTTP_NO_CONTENT);
    }
    return response()->json('You Cant Delete', Response::HTTP_FORBIDDEN);
  }
}
