<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ResumeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $resume = Resume::latest("updated_at", "desc")->paginate(3);
    return view('resume.index')->with('resume', $resume);
    // $resume = Resume::find(6);
    // return $resume->user;
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Resume $resume)
  {
    $this->authorize('create', $resume);
    $users =User::all();
    return view('resume.create')->with('users',$users);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    if ($request->hasFile('resume')) {
      $validated = $request->validate([
        'job_type' => 'required|string|max:20',
        'education' => 'required|string|max:20',
        'skills' => 'required|integer',
        'resume' => 'required|mimes:pdf,docx',
        'user_id' => 'required'
      ]);
      $file = $request->file('resume');
      $ext = $file->getClientOriginalExtension();
      $fileName = time() . '.' . $ext;
      $file->move(public_path('files'), $fileName);
      Resume::create([
        'job_type' => $validated['job_type'],
        'education' => $validated['education'],
        'skills' => $validated['skills'],
        'resume' => $fileName,
        'user_id' => $validated['user_id'],
      ]);
    }
    return redirect(route('resume.index'))->with('message', 'Added Successfully');
  }

  /**
   * Display the specified resource.
   */
  public function show(Resume $resume)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Resume $resume)
  {
    $this->authorize('update', $resume);
    return view('resume.edit')->with('resume', $resume);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Resume $resume)
  {
    $validated = $request->validate([
      'job_type' => 'required|string|max:20',
      'education' => 'required|string|max:20',
      'skills' => 'required|integer',
      'resume' => 'mimes:pdf,docx'
    ]);
    if ($request->hasFile('resume')) {
      $myImage = public_path('files') . '/' . $resume->image;
      if (File::exists($myImage)) {
        File::delete($myImage);
      }
      $file = $request->file('resume');
      $ext = $file->getClientOriginalExtension();
      $fileName = time() . '.' . $ext;
      $file->move(public_path('files'), $fileName);
      $resume->update([
        'job_type' => $validated['job_type'],
        'education' => $validated['education'],
        'skills' => $validated['skills'],
        'resume' => $fileName
      ]);
    } else {
      $resume->update([
        'job_type' => $validated['job_type'],
        'education' => $validated['education'],
        'skills' => $validated['skills']
      ]);
    }
    return redirect(route('resume.index'))->with('message', 'Updated Successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Resume $resume)
  {
    $this->authorize('delete', $resume);
    $myImage = public_path('files') . '/' . $resume->resume;
    if (File::exists($myImage)) {
      File::delete($myImage);
    }
    $resume->delete();
    return redirect(route('resume.index'))->with('message', 'Deleted Successfully');
  }
}
