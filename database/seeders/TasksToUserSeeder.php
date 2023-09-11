<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TasksToUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::factory()->create([
            'email' => config('app.admin_email'),
            'name' => 'admin',
            'password' => Hash::make(config('app.admin_email')),
        ]);

        \App\Models\Task::factory()->count(5)->create([
            'owner_id' => $user
        ])->each(function (\App\Models\Task $task) {
            $task->steps()->saveMany(\App\Models\Step::factory(rand(1, 5))->make(['task_id' => '']));
        });
    }
}
