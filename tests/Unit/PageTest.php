<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    
    public function a_page_can_be_posted()
    {
        $page = factory('App\Page')->create();

        $page->post();
        
        $this->assertEquals($page->status, 'posted');
    }

    /** @test */
    
    public function a_published_public_page_has_a_path()
    {
        $this->beAdmin();

        $page = factory('App\Page')->create([
            'is_public' => true,
            'status' => 'posted'
        ]);

        $this->assertEquals($page->publicPath(), route('public.page.show', $page->slug));
    }
}
