<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Route;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_has_projects()
    {
        $user = factory('App\User')->create();
        
        $this->assertInstanceOf(Collection::class, $user->projects);
    }

    /** @test */
    public function an_admin_can_have_pages()
    {
        $user = factory('App\User')->create();
        
        $this->assertInstanceOf(Collection::class, $user->pages);
    }
}
