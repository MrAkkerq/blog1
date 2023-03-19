<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
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
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'update articles']);
        Permission::create(['name' => 'create articles']);

        $admin = Role::create(['name' => 'Super-Admin']);
        $writer = Role::create(['name' => 'writer']);
        $user = Role::create(['name' => 'user']);

        $writer->givePermissionTo('edit articles');
        $writer->givePermissionTo('delete articles');
        $writer->givePermissionTo('update articles');
        $writer->givePermissionTo('create articles');

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
    }
}
