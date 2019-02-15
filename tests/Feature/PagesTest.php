<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setup();
        $this->beAdmin();
    }

    /** @test */
    public function the_admin_can_create_a_page()
    {
        $this->withoutExceptionHandling();

        $this->get(route('page.create'))->assertStatus(200);

        $page = factory('App\Page')->raw();
        
        $this->post(route('page.store'), $page);
        
        $this->assertDatabaseHas('pages', $page);
    }
    
    /** @test */
    public function only_the_admin_can_create_a_page()
    {
        $this->be(factory('App\User')->create());

        $page = factory('App\Page')->raw(['owner_id', Auth::user()->id]);

        $this->post(route('page.store'), $page)->assertForbidden();
    }

    /** @test */
    public function a_published_page_can_be_seen()
    {
        $page = factory('App\Page')->create([
            'is_public' => true,
            'status' => 'posted'
        ]);

        $this->get($page->publicPath())->assertSee($page->content);
    }

    /** @test */
    public function a_slug_has_to_be_unique()
    {
        $page1 = factory('App\Page')->raw(['slug' => 'a']);
        
        $this->post(route('page.store'), $page1)->assertSessionHasNoErrors();

        $page2 = factory('App\Page')->raw(['slug' => 'a']);

        $this->post(route('page.store'), $page2)->assertSessionHasErrors('slug');
    }

    /** @test */
    public function a_slug_cannot_be_a_registered_uri()
    {
        $page = factory('App\Page')->raw(['slug' => 'admin']);
            
        $this->post(route('page.store'), $page)->assertSessionHasErrors('slug');
    }

    /** @test */
    public function a_page_needs_content()
    {
        $page = factory('App\Page')->raw(['content' => '']);
            
        $this->post(route('page.store'), $page)->assertSessionHasErrors('content');
    }

    /** @test */
    public function a_page_needs_a_title()
    {
        $page = factory('App\Page')->raw(['title' => '']);
            
        $this->post(route('page.store'), $page)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_guest_cannot_create_a_page()
    {
        Auth::logout();

        $page = factory('App\Page')->raw(['owner_id', '']);
            
        $this->post(route('page.store'), $page)->assertRedirect('/admin');
    }
}
