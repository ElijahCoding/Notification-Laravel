<?php

namespace App\App\Notifications\Channels;

use ReflectionClass;
use App\App\Notifications\Notification;

class DatabaseChannel
{
    public function send($notifiable, Notification $notification)
    {
        return $notifiable->routeNotificationFor('database', $notification)->create([
            'id' => $notifiable->id,
            'type' => $this->getType($notification),
            'type_class' => get_class($notification),
            'data' => $notifiable->toArray($notifiable),
            'models' => json_encode($notification->models()),
            'read_at' => null
        ]);
    }

    protected function getType(Notification $notification)
    {
        return (new ReflectionClass($notification))->getShortName();
    }
}
