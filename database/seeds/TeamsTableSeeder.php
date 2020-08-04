<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
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
                'name' => '浦和レッズ',
                'number' => 10,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name' => 'バルセロナ',
                'number' => 10,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name' => '侍ジャパン',
                'number' => 10,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name' => 'レアルマドリッド',
                'number' => 10,
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];
        DB::table('teams')->insert($data);
    }
}
