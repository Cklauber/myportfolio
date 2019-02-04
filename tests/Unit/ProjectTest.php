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
}
