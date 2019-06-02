<?php namespace Controllers;

require_once 'Entry/NewEntry.php';
require_once 'Entry/GetEntry.php';
require_once 'GetEvent.php';
require_once 'Entry/Balance.php';
require_once './src/Events/Event.php';

use Controllers\NewEntry as NewEntry;
use Controllers\GetEntry as GetEntry;
use Controllers\GetEvent as GetEvent;
use Controllers\Balance as GetBalance;
use Events\Event as Event;

class Main
{
    public function newEntry($params = null, $id = null)
    {
        $newEntry = new NewEntry();
        $newEntry->attach(new Event());
        return $newEntry->newEntry($params, $id);
    }

    public function getEntry()
    {
        $getEntry =  new GetEntry();
        return $getEntry->getEntry();
    }

    public function getBalance()
    {
        $balance =  new GetBalance();
        return $balance->getBalance();
    }

    public function getEvents()
    {
        $getEvent = new GetEvent();
        return $getEvent->getEvent();
    }
}
