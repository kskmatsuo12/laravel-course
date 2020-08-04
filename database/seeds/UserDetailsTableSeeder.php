<?php

use Illuminate\Database\Seeder;

class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = [
            [
                'user_id' => 1,
                'address' => '東京都渋谷区１',
                'phone' => '09011111111',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 2,
                'address' => '東京都渋谷区2',
                'phone' => '09022222222',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 3,
                'address' => '東京都渋谷区3',
                'phone' => '09033333333',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 4,
                'address' => '東京都渋谷区4',
                'phone' => '09044444444',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 5,
                'address' => '東京都渋谷区5',
                'phone' => '09055555555',
                "created_at" => now(),
                "updated_at" => now()
            ],
            
        ];
        DB::table('user_details')->insert($data);
    }
}
