## Prerequisites:
 
* [Docker](https://www.docker.com/)
* [Fig](http://www.fig.sh/)

    $ sudo pip install -U fig

## To build Docker image

1. Clone this repo.

```
$ git clone https://github.com/ycombinator/currency-converter.git
$ cd currency-converter/slim
```

2. Build the Docker image and run a container from it

```
$ fig up
```

## To use:

### Get list of supported currencies
```
$ curl http://$DOCKER_HOST_IP:8000/currencies
```

### Convert one currency into another
```
$ curl -XPOST -d'{ "source": { "currency": "GBP", "amount": 2 }, "destination": { "currency": "GBP" } }' http://$DOCKER_HOST_IP:8000/converter
```
