<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Cbix\Cbix;
use Cbix\CbixException;

$cbix = Cbix::make();

/*
 * Get CBVIX data
 * The Volatility API returns daily historical index volatility data
 */

try {
    $result = $cbix->volatility(['limit' => 10]);
    //var_dump($result);
    foreach ($result->series as $r) {
        echo $r->cbix->hist_vol_30;
    }
} catch (CbixException $e) {
    //There was an error more information in $e->getMessage();
    //var_dump($e->getMessage());
    echo "Something went wrong!";
}