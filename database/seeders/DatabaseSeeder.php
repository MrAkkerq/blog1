<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        Article::factory(10)->create();
//        Task::factory(10)->create();
        $this->call([
            TasksToUserSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
