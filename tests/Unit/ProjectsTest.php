<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PortfoliosTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'title' => $this->faker->company,
            'description' => $this->faker->paragraph
        ];
        
        $this->post('/admin/portfolio', $attributes);

        $this->assertDatabaseHas('projects', $attributes);
    }
}
