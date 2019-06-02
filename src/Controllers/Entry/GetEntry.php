<?php namespace Controllers;

require_once './src/Events/Event.php';
require_once './src/Events/Reducer.php';

use Events\Event;
use Events\Reducer;

class GetEntry
{
    public function getEntry()
    {
        $reducer = new Reducer();
        $entrys = $reducer->reducce();

        $entrys = json_decode(json_encode($entrys), true);

        $result = array();

        foreach ($entrys as $entry) {
            $key = array_shift($entry);
            array_push($result, $entry);
        }

        return $result;
    }
}
