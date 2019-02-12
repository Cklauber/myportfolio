<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Auth\User;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $this->be(User::where('id', '1')->first());
    }
    /** @test */
    
    public function a_user_can_create_a_page()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $this->get(route('page.create'))->assertStatus(200);

        $page = factory('App\Page')->raw();

        $this->post(route('page.store'), $page);

        $this->assertDatabaseHas('pages', $page);
    }

    /** @test */
    
    public function a_published_page_can_be_seen()
    {
        $this->beAdmin();

        $page = factory('App\Page')->create([
            'is_public' => true,
            'status' => 'posted'
        ]);

        $this->get($page->publicPath())->assertSee($page->content);
    }
}
