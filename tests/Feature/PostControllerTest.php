<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Database\Factories\PostFactory;
use Database\Factories\CommentFactory;
use Tests\TestCase;
use App\Models\Post;
use App\Models\Comment;

class PostControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_store_comment()
    {
        $post = Post::factory()->create();

        $response = $this->post(route('comments.store', $post->id), [
            'user_id' => '3',
            'post_id' => $post->id,
            'comment' => 'Test Content',
        ]);
    }
}
