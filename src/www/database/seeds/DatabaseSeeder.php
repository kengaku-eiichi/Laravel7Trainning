<?php

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
        factory(App\User::class)->create(
            ['name' => '自分', 'email' => 'aa@bb.net']
        );
        factory(App\User::class, 9)->create();

        App\User::all()->each(function ($user) {
            factory(App\Message::class, $user->id % 4)->create(['user_id' => $user->id]);
        });

        factory(App\Admin::class)->create(
            ['username' => 'admin', 'password' => bcrypt('admin123')]
        );

        // $this->call(UserSeeder::class);
    }
}
