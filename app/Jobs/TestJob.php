<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Post;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $title;
    protected $content;
    protected $user_id;

    public function __construct($title,$content,$user_id)
    // public function __construct($array)
    {
        $this->title = $title;
        $this->content = $content;
        $this->user_id = $user_id;
        // $this->title = $array['title'];
        // $this->content = $array['content'];
        // $this->user_id = $array['user_id'];
    }

    public function handle()
    {
        //新しいもの作るnew
        $post = new Post;
        $post->title = $this->title;
        $post->content = $this->content;
        $post->user_id = $this->user_id;
        $post->save();
    }
}
