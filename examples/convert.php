<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Cbix\Cbix;
use Cbix\CbixException;

$cbix = Cbix::make();

/*
 * Convert between CAD and BTC
 * Returns the currency conversion between BTC and CAD based on live index price
 */

try {
    $result = $cbix->convert(500); //Converts 500 CAD to BTC using defaults
    //var_dump($result);

    if (isset($result->success) && $result->success !== true)
    {
        //Validation errors
        var_dump($result->messages);
    }

    echo $result->result;

} catch (CbixException $e) {
    //There was an error more information in $e->getMessage();
    var_dump($e->getMessage());
    echo "Something went wrong!";
}