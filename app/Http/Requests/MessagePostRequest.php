<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessagePostRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  // 名前の文字入力数
  public const NAME_STRING = 15;

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'name' => 'nullable|max:' . self::NAME_STRING,
      'message' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'name.max' => '名前は' . self::NAME_STRING . '文字以内で入力してください。',
    ];
  }
}
