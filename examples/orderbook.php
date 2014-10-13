<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Cbix\Cbix;
use Cbix\CbixException;

$cbix = Cbix::make();

/*
 * Get CBIX Orderbook
 * The Order Book API returns a full order book for all supported exchanges for use in calculating and displaying price depth
 */

try {
    $result = $cbix->orderbook(['limit' => 25]);
    //var_dump($result);
    foreach ($result->data->asks as $r) {
        echo $r->price;
    }
} catch (CbixException $e) {
    //There was an error more information in $e->getMessage();
    //var_dump($e->getMessage());
    echo "Something went wrong!";
}