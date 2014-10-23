<?php

require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
    'rates' => array('USD' => 1,
        'INR' => 61.17,
        'GBP' => 0.62,
        'JPY' => 107.49 
    )
));

$app->get('/currencies', function() use ($app)
{
    $rates      = $app->config('rates');
    $currencies = array_keys($rates);

    $content = array(
        'currencies' => $currencies
    );

    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setBody(json_encode($content));
});

$app->post('/converter', function() use ($app)
{
    $rates = $app->config('rates');

    $data = json_decode($app->request->getBody(), true);

    // TODO: Validation :)

    $sourceCurrency      = $data['source']['currency'];
    $sourceAmount        = $data['source']['amount'];
    $destinationCurrency = $data['destination']['currency'];

    $conversionRate      = $rates[$destinationCurrency] / $rates[$sourceCurrency];
    
    $destinationAmount   = $sourceAmount * $conversionRate;

    $content = $data;
    $content['destination']['amount'] = $destinationAmount;

    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->setBody(json_encode($content));
});

$app->run();