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
    $response = $this->postJson('/api/messages', [
      'name' => $this->faker->name,
      'emotion' => $this->faker->numberBetween(0, 2),
      'message' => $this->faker->realText(50, 2)
    ]);

    $response->assertOk();
  }
}
