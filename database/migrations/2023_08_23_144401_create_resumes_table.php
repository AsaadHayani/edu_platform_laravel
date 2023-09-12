<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('resumes', function (Blueprint $table) {
      $table->id();
      $table->string('job_type');
      $table->string('education');
      $table->integer('skills');
      $table->string('resume');
      $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('resumes');
  }
};
