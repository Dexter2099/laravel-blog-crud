<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_non_admin_cannot_create_post(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($user)->post('/posts', [
            'title' => 'Unauthorized',
            'content' => 'Nope',
        ]);

        $response->assertStatus(403);
        $this->assertDatabaseCount('posts', 0);
    }
}

