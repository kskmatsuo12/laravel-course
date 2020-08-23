<?php
namespace App\Services\Slack;

use Illuminate\Notifications\Notifiable;
use App\Notifications\SlackNotification;

class SlackService
{
    use Notifiable;

    public function send($message = null, $attachment = null)
    {
        $this->notify(new SlackNotification($message, $attachment));
    }

    protected function routeNotificationForSlack()
    {
        return config('services.slack.url');
    }
}