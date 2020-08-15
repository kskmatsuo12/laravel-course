<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;

class SendMail extends Command
{

    protected $signature = 'send:mail';

    protected $description = 'ユーザー１にメールを送る';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $user = User::find(1);
        $user->sendCustomMail($user);
    }
}
