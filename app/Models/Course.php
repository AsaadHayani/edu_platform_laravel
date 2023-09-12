<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  // o t m
  public function tutorials()
  {
    return $this->hasMany(Tutorial::class, 'course_id');
  }

  // m t m
  public function users()
  {
    return $this->belongsToMany(User::class, 'course_user');
  }
}
