<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tutorial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TutorialController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $tutorials = Tutorial::latest("updated_at", "desc")->paginate(5);
    return view('tutorials.index')->with('tutorials', $tutorials);
    // $tutorials = Tutorial::find(1);
    // return $tutorials->courses;
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Tutorial $tutorial)
  {
    $this->authorize('create', $tutorial);
    $courses = Course::all();
    return view('tutorials.create')->with('courses', $courses);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required|min:2|max:20',
      'content' => 'required|min:5|max:50',
      'video' => 'mimes:mp4,gif|max:3072',
      'course_id' => 'required',
    ]);
    if ($request->hasFile('video')) {
      $file = $request->file('video');
      $ext = $file->getClientOriginalExtension();
      $videoName = time() . '.' . $ext;
      $file->move(public_path('videos'), $videoName);
      Tutorial::create([
        'title' => $validated['title'],
        'content' => $validated['content'],
        'course_id' => $validated['course_id'],
        'video' => $videoName,
        'user_id' => auth()->user()->id,
      ]);
    } else {
      Tutorial::create([
        'title' => $validated['title'],
        'content' => $validated['content'],
        'course_id' => $validated['course_id'],
        'user_id' => auth()->user()->id,
      ]);
    }
    return redirect(route('tutorials.index'))->with('message', 'Added Successfully');
  }

  /**
   * Display the specified resource.
   */
  public function show(Tutorial $tutorial)
  {
    $this->authorize('view', $tutorial);
    $users = User::all();
    return view('tutorials.show', [
      'tutorial' => $tutorial,
      'users' => $users
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Tutorial $tutorial)
  {
    $this->authorize('update', $tutorial);
    $courses = Course::all();
    return view('tutorials.edit')->with('tutorial', $tutorial)->with('courses', $courses);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Tutorial $tutorial)
  {
    $validated = $request->validate([
      'title' => 'min:2|max:20',
      'content' => 'min:5|max:50',
      'video' => 'mimes:mp4,gif|max:3072',
      'course_id' => 'required',
    ]);
    if ($request->hasFile('video')) {
      $myImage = public_path('videos') . '/' . $tutorial->video;
      if (File::exists($myImage)) {
        File::delete($myImage);
      }
      $file = $request->file('video');
      $ext = $file->getClientOriginalExtension();
      $videoName = time() . '.' . $ext;
      $file->move(public_path('videos'), $videoName);
      $tutorial->update([
        'title' => $validated['title'],
        'content' => $validated['content'],
        'video' => $videoName,
        'course_id' => $validated['course_id'],
        // 'user_id' => auth()->user()->id,
      ]);
    } else {
      $tutorial->update([
        'title' => $validated['title'],
        'content' => $validated['content'],
        'course_id' => $validated['course_id'],
        // 'user_id' => auth()->user()->id,
      ]);
    }
    return redirect(route('tutorials.index'))->with('message', 'Updated Successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Tutorial $tutorial)
  {
    $this->authorize('delete', $tutorial);
    $myVideo = public_path('videos') . '/' . $tutorial->video;
    if (File::exists($myVideo)) {
      File::delete($myVideo);
    }
    $tutorial->delete();
    return redirect(route('tutorials.index'))->with('message', 'Deleted Successfully');
  }

  public function is_done(Tutorial $tutorial)
  {
    $this->authorize('viewAny', $tutorial);
    if ($tutorial->is_done == 0) {
      $tutorial->update(['is_done' => 1]);
    } else {
      $tutorial->update(['is_done' => 0]);
    }
    return redirect(route('tutorials.index'));
  }
}
