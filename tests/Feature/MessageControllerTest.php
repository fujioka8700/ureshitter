<?php

namespace Tests\Feature;

use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageControllerTest extends TestCase
{
  use RefreshDatabase;
  use WithFaker;

  /**
   * メッセージを投稿してデータベースに書き込む
   *
   * @return void
   */
  public function test_post_a_message()
  {
    $requestName = $this->faker->name;
    $requestEmotion = $this->faker->numberBetween(0, 2);
    $requestMessage = $this->faker->realText(50, 2);
    $requestPassword = ''; // 空文字にした場合、Controller内で「1234」に設定している。

    $response = $this->postJson('/api/messages', [
      'name' => $requestName,
      'emotion' => $requestEmotion,
      'message' => $requestMessage,
      'password' => $requestPassword,
    ]);

    $response->assertStatus(201)->assertJson([
      'name' => $requestName,
      'emotion' => $requestEmotion,
      'message' => $requestMessage
    ]);
  }

  /**
   * メッセージ一覧、降順で5件取得
   *
   * @return void
   */
  public function test_get_message_list()
  {
    Message::factory()->count(10)->create();

    $messages = Message::orderBy('created_at', 'desc')->get()->take(5)->toArray();

    $response = $this->getJson('/api/messages');

    $response
      ->assertStatus(200)
      ->assertJson([
        'data' => $messages
      ]);
  }

  /**
   * 無名なら名前を「名無し」にする
   *
   * @return void
   */
  public function test_set_name_to_no_name()
  {
    $requestName = '';
    $requestEmotion = $this->faker->numberBetween(0, 2);
    $requestMessage = $this->faker->realText(50, 2);

    $response = $this->postJson('/api/messages', [
      'name' => $requestName,
      'emotion' => $requestEmotion,
      'message' => $requestMessage
    ]);

    $response->assertStatus(201)->assertJson([
      'name' => '名無し',
      'emotion' => $requestEmotion,
      'message' => $requestMessage
    ]);
  }

  /**
   * 名前が16文字以上ならエラーメッセージを返す
   *
   * @return void
   */
  public function test_error_over_16_characters_in_name()
  {
    $error_messages = array('名前は15文字以下で入力してください。');

    $requestName = $this->faker->realTextBetween(16, 50, 2);
    $requestEmotion = $this->faker->numberBetween(0, 2);
    $requestMessage = $this->faker->realText(50, 2);

    $response = $this->postJson('/api/messages', [
      'name' => $requestName,
      'emotion' => $requestEmotion,
      'message' => $requestMessage
    ]);

    $response
      ->assertStatus(422)
      ->assertJson([
        'errors' => [
          'name' => $error_messages,
        ]
      ]);
  }

  /**
   * うれしかったこと無記入ならエラーメッセージを返す
   *
   * @return void
   */
  public function test_no_message_error()
  {
    $error_messages = array('うれしかったことを記入してください。');

    $requestName = $this->faker->name;
    $requestEmotion = $this->faker->numberBetween(0, 2);
    $requestMessage = '';

    $response = $this->postJson('/api/messages', [
      'name' => $requestName,
      'emotion' => $requestEmotion,
      'message' => $requestMessage
    ]);

    $response
      ->assertStatus(422)
      ->assertJson([
        'errors' => [
          'message' => $error_messages,
        ]
      ]);
  }

  /**
   * うれしかったこと141文字以上ならエラーメッセージを返す
   *
   * @return void
   */
  public function test_error_over_141_characters_in_message()
  {
    $error_messages = array('うれしかったことは140文字以下で入力してください。');

    $requestName = $this->faker->name;
    $requestEmotion = $this->faker->numberBetween(0, 2);
    $requestMessage = $this->faker->realTextBetween(141, 200, 2);

    $response = $this->postJson('/api/messages', [
      'name' => $requestName,
      'emotion' => $requestEmotion,
      'message' => $requestMessage
    ]);

    $response
      ->assertStatus(422)
      ->assertJson([
        'errors' => [
          'message' => $error_messages,
        ]
      ]);
  }

  /**
   * メッセージ1つ、Jsonを返す
   *
   * @return void
   */
  public function test_return_one_message()
  {
    Message::factory()->create();

    $message = Message::first();

    $response = $this->getJson('api/messages/' . $message->id);

    $response->assertStatus(200)->assertJson([
      'id' => $message->id,
      'name' => $message->name,
      'emotion' => $message->emotion,
      'message' => $message->message,
    ]);
  }
}
