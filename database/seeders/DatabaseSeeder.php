<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\ResumeFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    \App\Models\User::factory()->create([
      'name' => 'asaad',
      'email' => 'asaad@gmail.com',
      'password' => 12345678,
      'role' => 2
    ]);
    \App\Models\User::factory(5)->create([
      'role' => 0
    ]);

    $this->call([
      CourseSeeder::class,
    ]);

    $this->call([
      TutorialSeeder::class,
    ]);
  }
}
