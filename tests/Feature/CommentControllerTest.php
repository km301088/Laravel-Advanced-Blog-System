<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Factories\PostFactory;
use Database\Factories\CommentFactory;
use App\Models\Post;
use App\Models\Comment;


class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_comment_belongs_to_blog()
    {
        $post = Post::factory()->create();
        $comment = Comment::factory()->create(['post_id' => $post->id]);

        $this->assertEquals($post->id, $comment->post->id);
    }
}
