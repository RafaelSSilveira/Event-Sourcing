<?php namespace Controllers;

require_once './src/Events/Event.php';
require_once 'AbstractSubject.php';

use Events\Event;

class NewEntry extends AbstractSubject
{
    private $observers = array();

    public function __construct()
    {
    }

    public function attach(Event $observer_in)
    {
        $this->observers[] = $observer_in;
    }

    public function detach(Event $observer_in)
    {
        foreach ($this->observers as $okey => $oval) {
            if ($oval == $observer_in) {
                unset($this->observers[$okey]);
            }
        }
    }
    public function notify()
    {
        foreach ($this->observers as $obs) {
            $obs->newEvent($this);
        }
    }

    public function newEntry()
    {
        echo 'New Entry!</br> ';
        $this->notify();
    }
}
