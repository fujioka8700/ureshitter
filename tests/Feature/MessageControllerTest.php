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

    $response = $this->postJson('/api/messages', [
      'name' => $requestName,
      'emotion' => $requestEmotion,
      'message' => $requestMessage
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
}
