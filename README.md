This is a simple project to demonstrate the capabilities of
[Docker](https://www.docker.com/) and [Fig](http://www.fig.sh/) for development 
of a simple PHP application.

The application in this project is a simple currency converter HTTP API. For
demonstration purposes this application is built using the 
[Slim](http://www.slimframework.com/) PHP micro framework. It could just as
easily use any other PHP framework or no framework at all.

## To build and run locally

1. Clone this repo.

    $ git clone https://github.com/ycombinator/currency-converter.git
    $ cd currency-converter

2. Build the Docker image and run a container from it

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
