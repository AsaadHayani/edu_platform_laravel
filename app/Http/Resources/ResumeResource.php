<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResumeResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    // return parent::toArray($request);
    return [
      'id' => $this->id,
      'job_type' => $this->job_type,
      'education' => $this->education,
      'skills' => $this->skills,
      // 'resume' => $this->resume,
      'user_id' => $this->users,
    ];
  }
}
