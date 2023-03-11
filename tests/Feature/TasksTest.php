<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TasksTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanCreateTask()
    {
//        $this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->create());

        $attributes = Task::factory()->raw(['owner_id' => $user]);

        $this->post('/tasks', $attributes);

        $this->assertDatabaseHas('tasks', $attributes);
    }

    public function testGuestMayNotCreateTask()
    {
        $this->post('/tasks', [])->assertRedirect('/login');
    }
}
