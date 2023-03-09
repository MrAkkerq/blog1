<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ArticlesToUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        $admin = \App\Models\User::factory()->create([
            'email' => config('app.admin_email'),
            'name' => 'admin',
            'password' => Hash::make('123'),
        ])->assignRole('admin');

        $user1 = \App\Models\User::factory()->create([
            'email' => 'user1@mail.ru',
            'name' => 'user1',
            'password' => Hash::make('123'),
        ])->assignRole('user');

        foreach ([$admin, $user1] as $user) {
            \App\Models\Article::factory()->count(10)->create([
                'owner_id' => $user,
            ])->each(function (\App\Models\Article $article) {
                $article->tags()->saveMany(\App\Models\Tag::factory(rand(1, 5))->make());
            });
        }
    }
}
