<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  
    public function run()
    {
        for($i = 0; $i < 5; $i++){
            $data[] = [
                'name' => 'ユーザー'.$i,
                'email' => 'user'.$i.'@test.com',
                'password' => Hash::make('1'),
                "role" => 1,
                "status" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ];
        }
        DB::table('users')->insert($data);   }
}
