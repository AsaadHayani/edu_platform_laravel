<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = User::latest("updated_at", "desc")->get();
    return response()->json(new UserCollection($users), Response::HTTP_OK);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|integer',
      'role' => 'required|integer'
    ]);
    $user = User::create([
      'name' => $validated['name'],
      'email' => $validated['email'],
      'password' =>$validated['password'],
      'role' => $validated['role'],
    ]);
    return new UserResource($user);
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    return new UserResource($user);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateUserRequest $request, User $user)
  {
    $user->update($request->all());
    return new UserResource($user);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    $user_id = auth()->user();
    if ($user_id !== null && $user_id->tokenCan('delete')) {
      $user->delete();
    return response()->json(null, Response::HTTP_NO_CONTENT);
    }
    return response()->json('You Cant Delete', Response::HTTP_FORBIDDEN);
  }
}
