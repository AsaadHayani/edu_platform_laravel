<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
  /**
   * Determine whether the user can view any models.
   */
  public function viewAny(User $user): Response
  {
    return $user->role !== 0
      ? Response::allow()
      : Response::deny('Can\'t View Users by This User');
  }

  /**
   * Determine whether the user can view the model.
   */
  public function view(User $user, User $model): bool
  {
    //
  }

  /**
   * Determine whether the user can create models.
   */
  public function create(User $user): Response
  {
    return $user->role !== 0
      ? Response::allow()
      : Response::deny('Can\'t Create User by This User');
  }

  /**
   * Determine whether the user can update the model.
   */
  public function update(User $user, User $model): Response
  {
    return $user->role !== 0
      ? Response::allow()
      : Response::deny('Can\'t Updated User by This User');
  }

  /**
   * Determine whether the user can delete the model.
   */
  public function delete(User $user, User $model): Response
  {
    return $user->role !== 0
      ? Response::allow()
      : Response::deny('Can\'t Deleted User by This User');
  }

  /**
   * Determine whether the user can restore the model.
   */
  public function restore(User $user, User $model): bool
  {
    //
  }

  /**
   * Determine whether the user can permanently delete the model.
   */
  public function forceDelete(User $user, User $model): bool
  {
    //
  }
}
