<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PortfoliosTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */

    public function a_project_requires_an_owner()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Project')->raw(['owner_id' => \Auth::id()]);

        $this->post('/admin/portfolio', $attributes);

        $this->assertDatabaseHas('projects', $attributes);
    }

    /** @test */
    
    public function guest_cannot_admin_project_list()
    {
        $this->get('/admin/portfolio')->assertRedirect('/admin');
    }

    /** @test */
    
    public function guest_cannot_admin_a_single_project()
    {
        $project = factory('App\Project')->create();
        
        $this->get($project->privatePath())->assertRedirect('/admin');
    }

    /** @test */

    public function guests_cannot_create_a_project()
    {
        $attributes = factory('App\Project')->raw(['owner_id' => '']);

        $this->post('/admin/portfolio', $attributes)->assertRedirect('/admin');
    }

    /** @test */
    
    public function an_authenticated_user_cannot_view_someone_elses_project()
    {
        $project = factory('App\Project')->create();

        $this->actingAs(factory('App\User')->create());

        $this->get($project->privatePath())->assertStatus(403);
    }

    /** @test */
    
    public function an_authenticated_user_only_views_their_projects_list()
    {
        $this->withoutExceptionHandling();

        $projectsByAnotherUser = factory('App\Project', 2)->create();

        $this->actingAs(factory('App\User')->create());

        $projects = factory('App\Project', 2)->create(['owner_id' => \Auth::id()]);

        $this->get(route('admin.portfolio'))
        ->assertSee($projects[0]->title)
        ->assertSee($projects[1]->title)
        ->assertDontSee($projectsByAnotherUser[0]->title)
        ->assertDontSee($projectsByAnotherUser[1]->title);
    }

    /** @test */

    public function an_user_can_private_view_their_project()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory('App\User')->create());

        $project = factory('App\Project')->create(['owner_id' => \Auth::id()]);

        $this->get($project->privatePath())
        ->assertSee($project->title)
        ->assertSee($project->description);
    }

    /** @test */

    public function a_project_requires_a_title()
    {
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Project')->raw(['title' => '']);

        $this->post('/admin/portfolio', $attributes)->assertSessionHasErrors('title');
    }
    
    /** @test */

    public function a_project_requires_a_description()
    {
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Project')->raw(['description' => '']);

        $this->post('/admin/portfolio', $attributes)->assertSessionHasErrors('description');
    }
}
