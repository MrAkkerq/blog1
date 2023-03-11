<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testUserCanHaveTasks()
    {
//        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $attributes = Task::factory()->raw(['owner_id' => $user]);

        $user->tasks()->create($attributes);

        $this->assertEquals($attributes['title'], $user->tasks->first()->title);
    }

    public function testUserCanHaveCompany()
    {
        $user = User::factory()->create();

        $user->company()->create(['name' => 'AkkerCo']);

        $this->assertEquals('AkkerCo', $user->company->name);
    }
}
