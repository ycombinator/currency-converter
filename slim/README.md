## To run:

```
$ cd /path/to/same/dir/as/this/README
$ php -S localhost:8000 -t index.php
```

## To use:

### Get list of supported currencies
```
$ curl http://localhost:8000/currencies
```

### Convert one currency into another
```
$ curl -XPOST -d'{ "source": { "currency": "GBP", "amount": 2 }, "destination": { "currency": "GBP" } }' http://localhost:8000/converter
```
