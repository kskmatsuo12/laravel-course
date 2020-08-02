<?php

use Illuminate\Database\Seeder;

class TeamUserTableSeeder extends Seeder
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
                'team_id' => 1,
                'user_id' => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'team_id' => 2,
                'user_id' => 2,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'team_id' => 3,
                'user_id' => 3,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'team_id' => 4,
                'user_id' => 4,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'team_id' => 4,
                'user_id' => 5,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'team_id' => 2,
                'user_id' => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'team_id' => 3,
                'user_id' => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'team_id' => 4,
                'user_id' => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];
                DB::table('team_user')->insert($data);
    }
}
