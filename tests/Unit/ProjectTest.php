<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_private_path()
    {
        $project = factory('App\Project')->create();

        $this->assertEquals(route('admin.project.show', $project->slug), $project->privatePath());
    }

    /** @test */
    
    public function it_belong_to_an_user()
    {
        $project = factory('App\Project')->create();
        
        $this->assertInstanceOf("App\User", $project->owner);
    }

    /** @test */
    
    public function can_be_completed()
    {
        $project = factory('App\Project')->create();
        
        $project->complete();

        $this->assertEquals('completed', $project->status);
    }

    /** @test */
    
    public function if_it_is_public_it_has_a_public_path()
    {
        $project = factory('App\Project')->create(['is_public' => true]);
        
        $this->assertEquals(route('public.user.project.show', [
            'username' => $project->owner->username,
            'slug' => $project->slug]), $project->publicPath());
    }
}
