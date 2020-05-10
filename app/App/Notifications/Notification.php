<?php

namespace App\App\Notifications;

use ReflectionClass;
use Illuminate\Notifications\Notification as BaseNotification;

class Notification extends BaseNotification
{
    public function models()
    {
        $reflection = new ReflectionClass($this);

        
    }
}
