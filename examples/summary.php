<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Cbix\Cbix;
use Cbix\CbixException;

$cbix = Cbix::make();

/*
 * Get CBIX Summary
 * The Summary API returns the latest index and market summary including market capitalization, total coins in circulation and 52-week high and lows
 */

try {
    $result = $cbix->summary();
    //var_dump($result);
    echo $result->data->market_cap;
} catch (CbixException $e) {
    //There was an error more information in $e->getMessage();
    //var_dump($e->getMessage());
    echo "Something went wrong!";
}