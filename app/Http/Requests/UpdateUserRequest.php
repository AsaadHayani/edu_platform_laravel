<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'position' => 'required|integer'
      ];
    } else {
      return [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'position' => 'required|integer'
      ];
    }
  }
}
