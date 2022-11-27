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

  private const NAME_STRING    = 15;  // 名前の文字入力数
  private const MESSAGE_STRING = 140; // うれしかったことの文字入力数

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'name' => 'nullable|string|max:' . self::NAME_STRING,
      'emotion' => 'required|integer|min:0|max:2',
      'message' => 'required|string|max:' . self::MESSAGE_STRING,
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
      'message' => 'うれしかったこと',
    ];
  }

  /**
   * バリデーションメッセージ
   * @return array
   */
  public function messages()
  {
    return [
      'name.max' => ':attributeは' . self::NAME_STRING . '文字以下で入力してください。',
      'message.required' => ':attributeを記入してください。',
      'message.max' => ':attributeは' . self::MESSAGE_STRING . '文字以下で入力してください。',
    ];
  }
}
