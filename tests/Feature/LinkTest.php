<?php

namespace Tests\Feature;

use App\Link;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LinkTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLink()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->patch('/api/files/15');

        $response->assertStatus(200);
    }

    public function testLinkOneTime()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->get('/api/generate/15');

        $response->assertStatus(201);
    }
}
