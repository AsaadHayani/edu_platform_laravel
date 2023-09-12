<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tutorial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $courses = Course::latest("updated_at", "desc")->paginate(3);
    return view('courses.index')->with('courses', $courses);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Course $course)
  {
    $this->authorize('create', $course);
    $users = User::all();
    $tutorial = Tutorial::all();
    return view('courses.create', [
      'tutorial' => $tutorial,
    ])->with('users', $users);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    if ($request->hasFile('image')) {
      $validated = $request->validate([
        'name' => 'required|min:2|max:20',
        'desc' => 'required|min:5|max:50',
        'image' => 'required|mimes:jpg,jpeg,png|max:5048',
        // 'less' => 'required',
        'user' => 'required|array',
      ]);
      $file = $request->file('image');
      $ext = $file->getClientOriginalExtension();
      $imageName = time() . '.' . $ext;
      $file->move(public_path('images'), $imageName);
      $course = Course::create([
        'name' => $validated['name'],
        'desc' => $validated['desc'],
        'image' => $imageName,
        // 'less' => $validated['less']
        // 'user_id' => auth()->user()->id,
      ]);
      if (isset($validated['less'])) {
        $course->tutorials($validated['less']);
      }
      if (isset($validated['user'])) {
        $course->users()->syncWithoutDetaching($validated['user']);
      }
    }
    return redirect(route('courses.index'))->with('message', 'Added Successfully');
  }

  /**
   * Display the specified resource.
   */
  public function show(Course $course)
  {
    $this->authorize('view', $course);
    $users = User::all();
    return view('courses.show', [
      'course' => $course,
      'users' => $users,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Course $course)
  {
    $this->authorize('update', $course);
    $users = User::all();
    return view('courses.edit', [
      'course' => $course,
      'users' => $users,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Course $course)
  {
    $validated = $request->validate([
      'name' => 'min:2|max:20',
      'desc' => 'min:5|max:50',
      'image' => 'mimes:jpg,jpeg,png|max:5048',
      'user' => 'required|array',
    ]);
    if ($request->hasFile('image')) {
      $myImage = public_path('images') . '/' . $course->image;
      if (File::exists($myImage)) {
        File::delete($myImage);
      }
      $file = $request->file('image');
      $ext = $file->getClientOriginalExtension();
      $imageName = time() . '.' . $ext;
      $file->move(public_path('images'), $imageName);
      $course->update([
        'name' => $validated['name'],
        'desc' => $validated['desc'],
        'image' => $imageName,
        // 'user_id' => auth()->user()->id,
      ]);
    }
    $course->update([
      'name' => $validated['name'],
      'desc' => $validated['desc'],
      // 'user_id' => auth()->user()->id,
    ]);
    if (isset($validated['user'])) {
      $course->users()->syncWithoutDetaching($validated['user']);
    }
    return redirect(route('courses.index'))->with('message', 'Updated Successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Course $course)
  {
    $this->authorize('delete', $course);
    $myImage = public_path('images') . '/' . $course->image;
    if (File::exists($myImage)) {
      File::delete($myImage);
    }
    $course->delete();
    return redirect(route('courses.index'))->with('message', 'Deleted Successfully');
  }

  public function course_user(Course $course)
  {
    // $this->authorize('delete', $course);
    // $myImage = public_path('images') . '/' . $course->image;
    // if (File::exists($myImage)) {
    //   File::delete($myImage);
    // }
    // $course->delete();
    return redirect(route('courses.index'))->with('message', "Update Users to \"$course->name\" Successfully");
  }
}
