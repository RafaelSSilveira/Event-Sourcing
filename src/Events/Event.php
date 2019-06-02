<?php namespace Events;

include 'AbstractObserver.php';
require 'EventStore.php';

use Events\AbstractObserver;
use EventStore;

class Event extends AbstractObserver
{
    public function newEvent($data)
    {
        $store = new EventStore();
        $store->saveEvent($data);
    }

    public function getEvents()
    {
        $store = new EventStore();
        return $store->getEvent();
    }
}
