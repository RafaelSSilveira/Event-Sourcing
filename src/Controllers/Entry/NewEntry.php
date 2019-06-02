<?php namespace Controllers;

require_once './src/Events/Event.php';
require_once './src/Controllers/AbstractSubject.php';

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

    public function notify($data)
    {
        foreach ($this->observers as $obs) {
            $obs->newEvent($data);
        }
    }

    public function newEntry($params, $id)
    {
        $id_entry = $id === null ? time() : $id;
        $data = [
            'id_entry' => $id_entry,
            'value' => $params->value ? $params->value : 0,
            'date' => date("Y-m-d H:i:s"),
            'status' => $params->status ? $params->status : false
        ];
        $this->notify($data);

        return $id_entry;
    }
}
