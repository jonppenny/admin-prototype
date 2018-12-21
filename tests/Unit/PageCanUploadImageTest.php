<?php

namespace Tests\Unit;

use App\Page;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PageCanUploadImageTest extends TestCase
{
    /** @test */
    public function pageCanUploadImage()
    {
        $page = Page::create([
            'title'       => 'Test Page',
            'slug'        => 'test',
            'template'    => 'default',
            'the_content' => json_encode('testing'),
        ]);

        $response = $page::saveImage(
            'test',
            'https://static.independent.co.uk/s3fs-public/thumbnails/image/2018/01/16/10/emperor-penguin.jpg'
        );
    }
}
