# Event Sourcing

This project is a implementation of event sourcing architeture.

### Build
    $ docker-compose up --build


### Run
    $ docker-compose up

### Request
    $ curl -X GET http://localhost:8080/entry
    $ curl -X POST http://localhost:8080/entry -H "Content-type: application/json" -d '{"value": 10}'
    $ curl -X PUT http://localhost:8080/entry/{id}
    $ curl -X DELETE http://localhost:8080/entry/{id}
    $ curl -X GET http://localhost:8080/balance
    $ curl -X GET http://localhost:8080/events

### Acess MongoDB

    $ docker exec -it eventsourcing_mongo_1 mongo
    