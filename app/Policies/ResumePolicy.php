<?php

namespace App\Policies;

use App\Models\Resume;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ResumePolicy
{
  /**
   * Determine whether the user can view any models.
   */
  public function viewAny(User $user): bool
  {
    //
  }

  /**
   * Determine whether the user can view the model.
   */
  public function view(User $user, Resume $resume): bool
  {
    //
  }

  /**
   * Determine whether the user can create models.
   */
  public function create(User $user): Response
  {
    return $user->role !== 1
      ? Response::allow()
      : Response::deny('Can\'t Create resume by This User');
  }

  /**
   * Determine whether the user can update the model.
   */
  public function update(User $user, Resume $resume): Response
  {
    return $user->role == 2
      ? Response::allow()
      : Response::deny('Can\'t update resume by This User');
  }

  /**
   * Determine whether the user can delete the model.
   */
  public function delete(User $user, Resume $resume): Response
  {
    return $user->role == 2
      ? Response::allow()
      : Response::deny('Can\'t delete resume by This User');
  }

  /**
   * Determine whether the user can restore the model.
   */
  public function restore(User $user, Resume $resume): bool
  {
    //
  }

  /**
   * Determine whether the user can permanently delete the model.
   */
  public function forceDelete(User $user, Resume $resume): bool
  {
    //
  }
}
