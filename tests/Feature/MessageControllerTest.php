<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageControllerTest extends TestCase
{
  use RefreshDatabase;

  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function test_example()
  {
    var_dump(env('DB_CONNECTION'));

    $response = $this->get('/');

    $response->assertStatus(200);
  }
}
