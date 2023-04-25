<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            NewsAndArticlesToUsersSeeder::class,
        ]);
        \App\Models\TheNew::factory()->count(10)->create();
    }
}
