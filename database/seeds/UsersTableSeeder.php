<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  
    public function run()
    {
        $data = [
            [
                'name' => 1,
                'email' => 'user1@test.com',
                'password' => 'password',
                "role" => 1,
                "status" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];
        DB::table('users')->insert($data);
    }
}
