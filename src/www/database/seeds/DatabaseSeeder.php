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

        // $this->call(UserSeeder::class);
    }
}
