<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateResumeRequest;
use App\Http\Resources\ResumeCollection;
use App\Http\Resources\ResumeResource;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResumeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $resumes = Resume::latest("updated_at", "desc")->get();
    return response()->json(new ResumeCollection($resumes), Response::HTTP_OK);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'job_type' => 'required|string|max:20',
      'education' => 'required|string|max:20',
      'skills' => 'required|integer'
    ]);
    $resume = Resume::create([
      'job_type' => $validated['job_type'],
      'education' => $validated['education'],
      'skills' => $validated['skills']
    ]);
    return new ResumeResource($resume);
  }

  /**
   * Display the specified resource.
   */
  public function show(Resume $resume)
  {
    return new ResumeResource($resume);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateResumeRequest $request, Resume $resume)
  {
    $resume->update($request->all());
    return new ResumeResource($resume);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Resume $resume)
  {
    $user = auth()->user();
    if ($user !== null && $user->tokenCan('delete')) {
      $resume->delete();
      return response()->json(null, Response::HTTP_NO_CONTENT);
    }
    return response()->json('You Cant Delete', Response::HTTP_FORBIDDEN);
  }
}
