<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
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
                'title' => 'タイトル１',
                'content' => 'コンテンツ１',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 1,
                'title' => 'タイトル２',
                'content' => 'コンテンツ2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 1,
                'title' => 'タイトル3',
                'content' => 'コンテンツ3',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 1,
                'title' => 'タイトル4',
                'content' => 'コンテンツ4',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 2,
                'title' => 'タイトル5',
                'content' => 'コンテンツ5',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 2,
                'title' => 'タイトル6',
                'content' => 'コンテンツ6',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 3,
                'title' => 'タイトル7',
                'content' => 'コンテンツ7',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 1,
                'title' => 'タイトル8',
                'content' => 'コンテンツ8',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 1,
                'title' => 'タイトル9',
                'content' => 'コンテンツ9',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 5,
                'title' => 'タイトル10',
                'content' => 'コンテンツ10',
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];
        DB::table('posts')->insert($data);
    }
}
