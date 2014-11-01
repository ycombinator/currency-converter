This is a simple project to demonstrate the capabilities of
[Docker](https://www.docker.com/) and [Fig](http://www.fig.sh/) for development 
of a simple PHP application.

The application in this project is a simple currency converter HTTP API. For
demonstration purposes the same application is built using two PHP frameworks:
[Laravel](http://laravel.com/) and [Slim](http://www.slimframework.com/).

## To build and run in your local development environment

1. Clone this repo.

    $ git clone https://github.com/ycombinator/currency-converter.git
    $ cd currency-converter

2. Choose which framework you want to use.

    $ cd laravel

OR

    $ cd slim

3. Build the Docker image and run a container from it

    $ fig up

## To use the application's HTTP API

**Note:** If you are using [boot2docker](http://boot2docker.io/), replace 
`$DOCKER_HOST_IP` below with the IP reported by `boot2docker ip`.

### Get list of supported currencies
```
$ curl http://$DOCKER_HOST_IP:8000/currencies
```

### Convert one currency into another
```
$ curl -XPOST -d'{ "source": { "currency": "GBP", "amount": 2 }, "destination": { "currency": "GBP" } }' http://$DOCKER_HOST_IP:8000/converter
```
