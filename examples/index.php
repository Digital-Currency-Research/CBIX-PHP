<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Cbix\Cbix;
use Cbix\CbixException;

$cbix = Cbix::make();

/*
 * Get CBIX Index Value
 * Returns the latest index values, volume data and change information.
 */

try {
    $result = $cbix->index();
    //var_dump($result);
    echo $result->index->value;
} catch (CbixException $e) {
    //There was an error more information in $e->getMessage();
    //var_dump($e->getMessage());
    echo "Something went wrong!";
}