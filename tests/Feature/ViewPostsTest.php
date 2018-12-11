<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewPostsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function viewPagesTest()
    {
        $post = Post::create([
            'title' => 'Test Post',
            'slug'  => 'test'
        ]);

        $response = $this->get('/post/' . $post->slug);

        $response->assertStatus(200);
        $response->assertSee('Test Post');
    }
}
