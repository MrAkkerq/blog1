<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
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
//        \App\Models\Tag::factory()->count(10)->create();
        $this->call([
            ArticlesToUsersSeeder::class,
        ]);
        \App\Models\TheNew::factory()->count(10)->create();
    }
}
