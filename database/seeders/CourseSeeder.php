<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $nums = [1, 2, 3];
    foreach ($nums as $num) {
      \App\Models\Course::factory()->create([
        "name" => "Course " . $num,
        "desc" => "Description " . $num,
        "image" => "1.jpg",
        // "user_id" => $num,
      ]);
    }
    \App\Models\Course::factory(10)->create(["image" => "1.jpg"]);
  }
}
