<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CoursePolicy
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
  public function view(User $user, Course $course): Response
  {
    return $user->role == 2
      ? Response::allow()
      : Response::deny('Can\'t view Course details by This User');
  }

  /**
   * Determine whether the user can create models.
   */
  public function create(User $user): Response
  {
    return $user->role == 2
      ? Response::allow()
      : Response::deny('Can\'t Create Course by This User');
  }

  /**
   * Determine whether the user can update the model.
   */
  public function update(User $user, Course $course): Response
  {
    return $user->role == 2
      ? Response::allow()
      : Response::deny('Can\'t Updated Course by This User');
  }

  /**
   * Determine whether the user can delete the model.
   */
  public function delete(User $user, Course $course): Response
  {
    return $user->role == 2
      ? Response::allow()
      : Response::deny('Can\'t Delete Course by This User');
  }

  /**
   * Determine whether the user can restore the model.
   */
  public function restore(User $user, Course $course): bool
  {
    //
  }

  /**
   * Determine whether the user can permanently delete the model.
   */
  public function forceDelete(User $user, Course $course): bool
  {
    //
  }
}
