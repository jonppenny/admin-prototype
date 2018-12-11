<?php

namespace Tests\Feature;

use App\Page;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewPagesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function viewPagesTest()
    {
        $page = Page::create([
            'title'       => 'Test Page',
            'slug'        => 'test',
            'template'    => '',
            'the_content' => json_encode('testing'),
        ]);

        $response = $this->get('/' . $page->slug);

        $response->assertStatus(200);
        $response->assertSee('Test Page');
    }
}
