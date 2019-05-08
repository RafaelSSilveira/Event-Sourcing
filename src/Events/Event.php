<?php namespace Events;

require 'AbstractObserver.php';

class Event extends AbstractObserver
{
    public function newEvent()
    {
        echo $teste;
        echo ('New Event! </br>');
    }
}
