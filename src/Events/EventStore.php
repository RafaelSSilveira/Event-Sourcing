<?php

class EventStore
{
    private $manager;
    private $database;

    public function __construct()
    {
        $configDB = [
            'host' => 'mongo',
            'dbName' => 'eventsourcing',
            'username' => '',
            'password' => ''
     
        ];

        $this->manager = new MongoDB\Driver\Manager(
            "mongodb://{$configDB['host']}/{$configDB['dbName']}"
        );

        $this->database = $configDB['dbName'] . ".event";
    }
    
    public function saveEvent($data)
    {
        try {
            if ($this->manager) {
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->insert($data);
                $this->manager->executeBulkWrite($this->database, $bulk);
            }
        } catch (Exception $e) {
            echo  "<center><h1>Doesn't work</h1></center>";
            var_dump($e->getMessage());
            exit;
        }
    }

    public function getEvent()
    {
        try {
            if ($this->manager) {
                $filter = [];
                $options = [];

                $query = new \MongoDB\Driver\Query($filter, $options);
                $rows  = $this->manager->executeQuery($this->database, $query);

                $result = array();

                foreach ($rows as $document) {
                    array_push($result, $document);
                }
                return $result;
            }
        } catch (Exception $e) {
            echo  "<center><h1>Doesn't work</h1></center>";
            var_dump($e->getMessage());
            exit;
        }
    }
}
