<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  
    public function run()
    {
        $data = [
            [
                'name' => 'ユーザー１',
                'email' => 'user1@test.com',
                'password' => Hash::make('password'),
                "role" => 1,
                "status" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name' => 'ユーザー２',
                'email' => 'user2@test.com',
                'password' => Hash::make('password'),
                "role" => 1,
                "status" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name' => 'ユーザー３',
                'email' => 'user3@test.com',
                'password' => Hash::make('password'),
                "role" => 1,
                "status" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];
        DB::table('users')->insert($data);
    }
}
