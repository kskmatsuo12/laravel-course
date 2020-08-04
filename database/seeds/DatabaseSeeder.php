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
        $this->call(PostsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(UserDetailsTableSeeder::class);
        $this->call(TeamUsersTableSeeder::class);
        // $this->call(TeamUserTableSeeder::class);
    }
}
