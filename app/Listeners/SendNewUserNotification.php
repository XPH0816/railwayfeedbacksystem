<?php

namespace App\Listeners;

use App\Events\Registered;
use App\Notifications\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewUserNotification implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function __invoke(Registered $event): void
    {
        $event->user->notify(new NewUserNotification($event->user, $event->password));
    }
}
