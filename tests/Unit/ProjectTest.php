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

        $this->assertEquals(route('admin.portfolio.show', $project->slug), $project->privatePath());
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
}
