<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;

class PostImageUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_can_be_created_with_image(): void
    {
        Storage::fake('public');

        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->post('/posts', [
            'title' => 'With Image',
            'content' => 'Content',
            'image' => UploadedFile::fake()->image('photo.jpg'),
        ]);

        $response->assertRedirect('/posts');

        $post = Post::first();
        $this->assertNotNull($post->image_path);
        Storage::disk('public')->assertExists($post->image_path);
    }
}
