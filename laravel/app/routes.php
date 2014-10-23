<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/currencies', function()
{
    $rates      = Config::get('app.rates');
    $currencies = array_keys($rates);

    $content = array(
        'currencies' => $currencies
    );

    return Response::make(json_encode($content))
        ->header('Content-Type', 'application/json');
});

Route::post('/converter', function()
{
    $rates = Config::get('app.rates');

    $data = Input::json()->all();

    // TODO: Validation :)

    $sourceCurrency      = $data['source']['currency'];
    $sourceAmount        = $data['source']['amount'];
    $destinationCurrency = $data['destination']['currency'];

    $conversionRate      = $rates[$destinationCurrency] / $rates[$sourceCurrency];
    
    $destinationAmount   = $sourceAmount * $conversionRate;

    $content = $data;
    $content['destination']['amount'] = $destinationAmount;

    return Response::make(json_encode($content))
        ->header('Content-Type', 'application/json');

});