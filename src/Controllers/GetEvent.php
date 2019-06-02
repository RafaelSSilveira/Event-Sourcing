<?php namespace Controllers;

require_once './src/Events/Event.php';

use Events\Event;

class GetEvent
{
    public function getEvent()
    {
        $getEvent = new Event();
        $events = $getEvent->getEvents();

        return $events;
    }
}
