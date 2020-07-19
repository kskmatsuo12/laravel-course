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
                'content' => 'コンテンツ１コンテンツ１コンテンツ１',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 1,
                'title' => 'タイトル２',
                'content' => 'コンテンツ2コンテンツ2コンテンツ2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 1,
                'title' => 'タイトル3',
                'content' => 'コンテンツ3コンテンツ3コンテンツ3',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 1,
                'title' => 'タイトル4',
                'content' => 'コンテンツ4コンテンツ4コンテンツ4',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 2,
                'title' => 'タイトルユーザー２のやつ',
                'content' => 'コンテンツ５コンテンツ５コンテンツ５',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'user_id' => 2,
                'title' => 'タイトル6',
                'content' => 'コンテンツ6コンテンツ6コンテンツ6',
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];
        DB::table('posts')->insert($data);
    }
}
