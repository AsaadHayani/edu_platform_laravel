<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTutorialRequest;
use App\Http\Resources\TutorialCollection;
use App\Http\Resources\TutorialResource;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TutorialController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $tutorials = Tutorial::latest("updated_at", "desc")->get();
    return response()->json(new TutorialCollection($tutorials), Response::HTTP_OK);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required|min:2|max:20',
      'content' => 'required|min:5|max:50'
    ]);
    $tutorial = Tutorial::create([
      'title' => $validated['title'],
      'content' => $validated['content'],
      'user_id' => 1
    ]);
    return new TutorialResource($tutorial);
  }

  /**
   * Display the specified resource.
   */
  public function show(Tutorial $tutorial)
  {
    return new TutorialResource($tutorial);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateTutorialRequest $request, Tutorial $tutorial)
  {
    $tutorial->update($request->all());
    return new TutorialResource($tutorial);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Tutorial $tutorial)
  {
    $user = auth()->user();
    if ($user !== null && $user->tokenCan('delete')) {
      $tutorial->delete();
    return response()->json(null, Response::HTTP_NO_CONTENT);
    }
    return response()->json('You Cant Delete', Response::HTTP_FORBIDDEN);
  }
}
