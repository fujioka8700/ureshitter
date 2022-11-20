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
   * メッセージ一覧の取得
   *
   * @return void
   */
  public function test_get_message_list()
  {
    Message::factory()->count(10)->create();

    $response = $this->getJson('/api/messages');

    dump($response);
  }
}
