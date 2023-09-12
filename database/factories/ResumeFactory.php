<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resume>
 */
class ResumeFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'job_type' => fake()->text(),
      'education' => fake()->text(),
      'skills' => fake()->numberBetween(0, 100),
      'resume' => fake()->text(),
    ];
  }
}
