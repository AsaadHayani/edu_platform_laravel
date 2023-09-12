<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTutorialRequest extends FormRequest
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
        'title' => 'required|string|min:2|max:20',
        'content' => 'required|string|min:5|max:50'
      ];
    } else {
      return [
        'title' => 'required|sometimes|string|min:2|max:20',
        'content' => 'required|sometimes|string|min:5|max:50'
      ];
    }
  }
}
