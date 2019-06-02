# Event Sourcing

This project is a implementation of event sourcing architeture.

### Build
    $ npm install
    $ docker-compose up --build


### Run
    $ docker-compose up

### Request
    $ curl -X GET http://localhost:8000/entry
    $ curl -X POST http://localhost:8000/entry -H "Content-type: application/json" -d '{"value": 10}'
    $ curl -X PUT http://localhost:8000/entry/{id}
    $ curl -X DELETE http://localhost:8000/entry/{id}
    $ curl -X GET http://localhost:8000/balance
    $ curl -X GET http://localhost:8000/events

### Acess MongoDB

    $ docker exec -it eventsourcing_mongo_1 mongo
    



