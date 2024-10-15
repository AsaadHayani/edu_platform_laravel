<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CoursePolicy
{
  public function viewAny(User $user): bool
  {
  }

  public function view(User $user, Course $course): Response
  {
    return $user->role == 2
      ? Response::allow()
      : Response::deny('Can\'t view Course details by This User');
  }

  public function create(User $user): Response
  {
    return $user->role == 2
      ? Response::allow()
      : Response::deny('Can\'t Create Course by This User');
  }

  public function update(User $user, Course $course): Response
  {
    return $user->role == 2
      ? Response::allow()
      : Response::deny('Can\'t Updated Course by This User');
  }

  public function delete(User $user, Course $course): Response
  {
    return $user->role == 2
      ? Response::allow()
      : Response::deny('Can\'t Delete Course by This User');
  }

  public function restore(User $user, Course $course): bool
  {
  }

  public function forceDelete(User $user, Course $course): bool
  {
  }
}
