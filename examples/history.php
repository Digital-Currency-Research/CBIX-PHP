<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Cbix\Cbix;
use Cbix\CbixException;

$cbix = Cbix::make();

/*
 * Get CBIX History
 * Returns daily index values and change information from 2011-09-01
 */

try {
    $result = $cbix->history(['limit' => 10]);
    //var_dump($result);
    foreach ($result->data as $r) {
        echo $r->close;
    }
} catch (CbixException $e) {
    //There was an error more information in $e->getMessage();
    //var_dump($e->getMessage());
    echo "Something went wrong!";
}