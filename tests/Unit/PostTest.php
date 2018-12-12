<?php

namespace Tests\Unit;

use App\Post;
use function factory;
use function json_encode;
use function route;
use Tests\TestCase;

class PostTest extends TestCase
{
    /** @test */
    public function test_can_create_post()
    {
        $post = factory(Post::class)->create();

        $data = [
            'title'         => $this->faker->title,
            'slug'          => $this->faker->slug,
            'the_content'   => json_encode('[string:"test"]'),
            'the_excerpt'   => json_encode('[string:"test"]'),
            'preview_image' => '',
            'full_image'    => ''
        ];

        $response = $this->post(route('post.store', $post->id), $data);
        $response->assertStatus(302);
    }

    /** @test */
    public function test_can_show_post()
    {
    }

    /** @test */
    public function test_can_update_post()
    {
        $post = factory(Post::class)->create();

        $data = [
            'title'       => $this->faker->title,
            'slug'        => $this->faker->slug,
            'the_content' => json_encode('[string:"test"]'),
            'the_excerpt' => json_encode('[string:"test"]'),
        ];

        $response = $this->patch(route('post.update', $post->id), $data);
        $response->assertStatus(302);
    }

    /** @test */
    public function test_can_delete_post()
    {
        $post = factory(Post::class)->create();

        $response = $this->delete(route('post.delete', $post->id));

        $response->assertStatus(302);
    }
}
