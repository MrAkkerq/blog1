<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class NewsAndArticlesToUsersSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'create articles']);
        Permission::create(['name' => 'update articles']);
        Permission::create(['name' => 'delete articles']);

        $admin = Role::create(['name' => 'Super-Admin']);
        $writer = Role::create(['name' => 'writer']);
        $user = Role::create(['name' => 'user']);

        $writer->givePermissionTo('create articles');
        $writer->givePermissionTo('update articles');
        $writer->givePermissionTo('delete articles');

        $user->givePermissionTo('create articles');
        $user->givePermissionTo('update articles');

        \App\Models\User::factory()->create([
            'email' => config('app.admin_email'),
            'name' => 'admin',
            'password' => Hash::make('123'),
        ])->assignRole($admin);

        \App\Models\User::factory()->create([
            'email' => 'writer@mail.ru',
            'name' => 'writer',
            'password' => Hash::make('123'),
        ])->assignRole($writer);

        \App\Models\User::factory()->create([
            'email' => 'user@mail.ru',
            'name' => 'user',
            'password' => Hash::make('123'),
        ])->assignRole($user);

//        \App\Models\User::factory()->count(2)->create();

        $tags = \App\Models\Tag::factory()->count(4)->create();

        foreach (\App\Models\User::get() as $user) {
            \App\Models\Article::factory()->count(10)->create([
                'owner_id' => $user,
            ])->each(function (\App\Models\Article $article) use ($tags) {
                $article->tags()->saveMany(\App\Models\Tag::factory(rand(1, 2))->make());

                $article->tags()->save($tags[rand(0, count($tags) - 1)]);
            });
        }

        \App\Models\TheNew::factory()->count(10)->create()->each(function (\App\Models\TheNew $theNew) use ($tags) {
            $theNew->tags()->saveMany(\App\Models\Tag::factory(rand(1, 2))->make());

            $theNew->tags()->save($tags[rand(0, count($tags) - 1)]);
        });
    }
}
