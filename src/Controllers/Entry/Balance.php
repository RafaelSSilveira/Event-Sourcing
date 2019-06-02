<?php namespace Controllers;

require_once './src/Events/Event.php';
require_once './src/Events/Reducer.php';

use Events\Event;
use Events\Reducer;

class Balance
{
    public function getBalance()
    {
        $reducer = new Reducer();
        $entrys = $reducer->reducce();

        $balance = $this->calBalance($entrys);

        return $balance;
    }

    public function calBalance($entrys)
    {
        $balance = 0;

        foreach ($entrys as $entry) {
            $balance += $entry->value;
        }

        return $balance;
    }
}
