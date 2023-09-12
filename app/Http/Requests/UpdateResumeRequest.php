<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResumeRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    $user = $this->user();
    if ($user !== null && $user->tokenCan('update')) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    $method = $this->method();
    if ($method == 'PUT') {
      return [
      'job_type' => 'required|string|max:20',
      'education' => 'required|string|max:20',
      'skills' => 'required|integer'
      ];
    } else {
      return [
      'job_type' => 'required|string|max:20',
      'education' => 'required|string|max:20',
      'skills' => 'required|integer'
      ];
    }
  }
}
