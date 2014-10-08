<?php namespace Cbix;

use GuzzleHttp\Client;

/**
 * Class Cbix
 * @package Cbix
 */
class Cbix
{
    /**
     * @return CbixCore
     */
    public static function make()
    {
        $client = new Client([
            'base_url' => ["https://cbix-prod.apigee.net/api/{version}/", ['version' => 'v1']]
        ]);

        return new CbixCore($client);
    }
}