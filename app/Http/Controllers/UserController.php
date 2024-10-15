<?php

namespace App\Http\Controllers;

use App\Mail\Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class UserController extends Controller
{
  public function save(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|',
    ]);

    // Create a new User object and populate its properties
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;

    // Generate a verification code
    $verificationCode = Str::random(3); // Adjust the length as needed
    $user->verification_code = $verificationCode;

    FacadesMail::to($user->email)->send(new Mail($verificationCode));

    $user->save();

    // Redirect the user to the registration page with a success message
    return redirect()->route('user.register')->with('success', 'Email verification sent. Please check your email.');
  }
  /**
   * Display a listing of the resource.
   */
  public function index(User $user)
  {
    $user = User::latest('updated_at', 'desc')->paginate(5);
    return view('users.index')->with('users', $user);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(User $user)
  {
    $this->authorize('create', $user);
    return view('users.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    if ($request['c-password'] === $request['password']) {
      $validate = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => ['required', Password::min(8)
          ->letters()
          ->mixedCase()
          ->numbers()
          ->symbols()
          ->uncompromised()],
        'role' => 'required|integer'
      ]);
      User::create($validate);
      return redirect(route('users.index'))->with('message', 'Added Succefully');
    } else {
      return redirect(route('users.create'))->with('message', 'Passwords do not match');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    $this->authorize('update', $user);
    return view('users.edit', [
      'user' => $user
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $user)
  {
    $validate = $request->validate([
      'name' => 'min:2',
      'email' => 'unique:users,email,' . $user->id,
      'password' => ['nullable', Password::min(8)
        ->letters()
        ->mixedCase()
        ->numbers()
        ->symbols()
        ->uncompromised()],
      'role' => 'required|integer'
    ]);
    if ($validate['password'] == null) {
      $user->update([
        'name' => $validate['name'],
        'email' => $validate['email'],
        'role' => $validate['role'],
      ]);
    } else {
      if ($request['c-password'] === $request['password']) {
        $user->update($validate);
        return redirect(route('users.index'))->with('message', 'Updated Succefully');
      } else {
        return redirect(route('users.edit', $user))->with('message', 'Passwords do not match');
      }
    }
    return redirect(route('users.index'))->with('message', 'Updated Succefully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    $this->authorize('delete', $user);
    $user->delete();
    return redirect(route('users.index'))->with('message', 'Deleted Successfully');
  }

  public function is_done(User $user)
  {
    if ($user->user_is_done == 1) {
      $user->update(['user_is_done' => 0]);
      return redirect(route('users.index'))->with('message', 'Isn\'t Done' . $user->name);
    } else {
      $user->update(['user_is_done' => 1]);
      return redirect(route('users.index'))->with('message', 'Is Done' . $user->name);
    }
  }
}
