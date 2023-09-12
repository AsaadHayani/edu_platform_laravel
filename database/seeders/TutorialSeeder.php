<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TutorialSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $nums = [1, 2, 3];
    foreach ($nums as $num) {
      \App\Models\Tutorial::factory()->create([
        "title" => "Lesson " . $num,
        "content" => "Content " . $num,
        "video" => "1.mp4",
        // "user_is_done" => 1,
        // "user_id" => 1,
        "course_id" => $num,
      ]);
    }
    \App\Models\Tutorial::factory(10)->create([
      "video" => "1.mp4",
      // "user_id" => 1,
      "course_id" => 10
    ]);
  }
}
