<?php

namespace App\Policies;

use App\Models\Tutorial;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TutorialPolicy
{
  /**
   * Determine whether the user can view any models.
   */
  public function viewAny(User $user, Tutorial $tutorial): Response
  {
    return $user->role == 1
      ? Response::allow()
      : Response::deny('Can\'t check done to this Tutorial by This User');
  }

  /**
   * Determine whether the user can view the model.
   */
  public function view(User $user, Tutorial $tutorial): Response
  {
    return $user->role == 1
      ? Response::allow()
      : Response::deny('Can\'t View check Tutorial by This User');
  }

  /**
   * Determine whether the user can create models.
   */
  public function create(User $user): Response
  {
    return $user->role !== 0
      ? Response::allow()
      : Response::deny('Can\'t Add Tutorial by This User');
  }

  /**
   * Determine whether the user can update the model.
   */
  public function update(User $user, Tutorial $tutorial): Response
  {
    return $user->role !== 0
      ? Response::allow()
      : Response::deny('Can\'t Update Tutorial by This User');
  }

  /**
   * Determine whether the user can delete the model.
   */
  public function delete(User $user, Tutorial $tutorial): Response
  {
    return $user->role !== 0
      ? Response::allow()
      : Response::deny('Can\'t Delete Tutorial by This User');
  }

  /**
   * Determine whether the user can restore the model.
   */
  public function restore(User $user, Tutorial $tutorial): bool
  {
    //
  }

  /**
   * Determine whether the user can permanently delete the model.
   */
  public function forceDelete(User $user, Tutorial $tutorial): bool
  {
    //
  }
}
