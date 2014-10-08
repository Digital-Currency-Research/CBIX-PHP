<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Cbix\Cbix;
use Cbix\CbixException;

$cbix = Cbix::make();

/*
 * Get CBIX News
 * Returns the latest news feed curated by CBIX
 */

try {
    $result = $cbix->news();
    //var_dump($result);
    foreach ($result->data as $r) {
        echo $r->title;
    }
} catch (CbixException $e) {
    //There was an error more information in $e->getMessage();
    //var_dump($e->getMessage());
    echo "Something went wrong!";
}