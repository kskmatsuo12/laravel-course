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
    protected $uid;

    public function __construct($title,$content,$uid)
    {
        $this->title = $title;
        $this->content = $content;
        $this->uid = $uid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $post = new Post;
        $post->title = $this->title;
        $post->content = $this->content;
        $post->user_id = $this->uid;
        $post->save();
    }
}
