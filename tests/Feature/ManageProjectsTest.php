<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class ManageProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */

    public function a_project_requires_an_owner()
    {
        $this->withoutExceptionHandling();

        $this->beAdmin();
        
        $this->get((route('project.create')))->assertStatus(200);
        
        $attributes = factory('App\Project')->raw(['owner_id' => \Auth::id()]);

        $this->post(route('project.store'), $attributes);
    
        $this->assertDatabaseHas('projects', $attributes);
    }

    /** @test */
    
    public function guest_cannot_manage_projects()
    {
        $project = factory('App\Project')->create();

        //They cannot have a private view of it
        $this->get($project->privatePath())->assertRedirect('/admin');

        //Cannot see a list of it
        $this->get(route('admin.project.index'))->assertRedirect('/admin');

        //Cannot create it
        $this->post(route('project.store'), $project->toArray())->assertRedirect('/admin');

        //Cannot view create form
        $this->get(route('project.create'))->assertRedirect('/admin');
    }

    /** @test */
    
    public function an_authenticated_user_cannot_view_someone_elses_project()
    {
        $project = factory('App\Project')->create(['is_public' => true, 'owner_id' => 1]);

        $this->signIn();

        $this->get($project->privatePath())->assertStatus(403);
    }

    /** @test */
    
    public function an_authenticated_user_only_views_their_projects_list()
    {
        $this->withoutExceptionHandling();

        $projectsByAnotherUser = factory('App\Project', 2)->create();

        $this->signIn();

        $projects = factory('App\Project', 2)->create(['owner_id' => \Auth::id()]);

        $this->get(route('admin.project.index'))
        ->assertSee($projects[0]->title)
        ->assertSee($projects[1]->title)
        ->assertDontSee($projectsByAnotherUser[0]->title)
        ->assertDontSee($projectsByAnotherUser[1]->title);
    }

    /** @test */

    public function an_user_can_private_view_their_project()
    {
        $this->withoutExceptionHandling();

        $this->be(factory('App\User')->create());
        
        $project = factory('App\Project')->create(['owner_id' => \Auth::id()]);
        $this->get($project->privatePath())
        ->assertSee($project->title)
        ->assertSee($project->description);
    }

    /** @test */

    public function a_project_requires_a_title()
    {
        $this->signIn();

        $attributes = factory('App\Project')->raw(['title' => '']);

        $this->post('/admin/project', $attributes)->assertSessionHasErrors('title');
    }
    
    /** @test */

    public function a_project_requires_a_description()
    {
        $this->signIn();

        $attributes = factory('App\Project')->raw(['description' => '']);

        $this->post('/admin/project', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    
    public function a_public_project_can_be_seen_by_the_public()
    {
        $project = factory('App\Project')->create(['is_public' => true]);

        $this->get($project->publicPath())->assertStatus(200);
    }

    /** @test */
    
    public function a_private_project_cannot_be_seen_by_the_public()
    {
        $project = factory('App\Project')->create(['is_public' => false]);

        $this->get($project->publicPath())->assertStatus(403);
    }
}
