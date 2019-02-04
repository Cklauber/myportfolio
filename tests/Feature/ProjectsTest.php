<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PortfoliosTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $user = factory('App\User')->create();
        $this->be($user);
    }
    /** @test */
    public function a_project_requires_an_owner()
    {
        //posting with an owner
        $this->withoutExceptionHandling();
        $attributes = factory('App\Project')->raw(['created_by' => \Auth::id()]);
        $this->post('/admin/portfolio', $attributes);
        $this->assertDatabaseHas('projects', $attributes);

        //Posting without an owner
    }
    /** @test */
    public function only_a_logged_in_user_can_create_a_project()
    {
        \Auth::logout();
        $attributes = factory('App\Project')->raw(['created_by' => '']);
        $this->post('/admin/portfolio', $attributes)->assertRedirect('/admin');
    }
    /** @test */
    public function a_project_requires_a_title()
    {
        $attributes = factory('App\Project')->raw(['title' => '']);
        $this->post('/admin/portfolio', $attributes)->assertSessionHasErrors('title');
    }
    
    /** @test */
    public function a_project_requires_a_description()
    {
        $user = factory('App\User')->create();
        $this->actingAs($user);
        $attributes = factory('App\Project')->raw(['description' => '']);
        $this->post('/admin/portfolio', $attributes)->assertSessionHasErrors('description');
    }
    /** @test */
    public function a_user_can_private_view_their_project()
    {
        $this->withoutExceptionHandling();

        $project = factory('App\Project')->create();

        $this->get($project->privatePath())
        ->assertSee($project->title)
        ->assertSee($project->description);
    }
}
