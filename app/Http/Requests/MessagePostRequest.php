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

  private const NAME_STRING = 15; // 名前の文字入力数

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

  /**
   *  バリデーション項目名定義
   * @return array
   */
  public function attributes()
  {
    return [
      'name' => '名前',
    ];
  }

  /**
   * バリデーションメッセージ
   * @return array
   */
  public function messages()
  {
    return [
      'name.max' => ':attributeは' . self::NAME_STRING . '文字以内で入力してください。',
      'message.required' => 'うれしかったことを記入してください。'
    ];
  }
}
