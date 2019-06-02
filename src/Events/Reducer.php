<?php namespace Events;

require_once 'Event.php';

use Events\Event;

class Reducer
{
    public function reducce()
    {
        $getEvent = new Event();

        $events = $getEvent->getEvents();
        $entrys = $this->mergeEvents($events);
        
        return $entrys;
    }

    public function mergeEvents($events)
    {
        $results = array();
        $aux = array();

        foreach ($events as $event) {
            empty($results) && array_push($results, $event);
            if ($event->status === true) {
                foreach ($results as $result) {
                    if ($result->id_entry === $event->id_entry) {
                        $result->value = $event->value;
                    } elseif (!in_array($event->id_entry, $aux)) {
                        array_push($results, $event);
                    }
                    array_push($aux, $event->id_entry);
                }
            }
        }

        return $results;
    }
}
