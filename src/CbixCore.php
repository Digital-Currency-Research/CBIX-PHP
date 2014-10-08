<?php namespace Cbix;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CbixCore implements CbixInterface
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        try {
            $response = $this->client->get("index");
        } catch (RequestException $e) {
            throw new CbixException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    public function history($options = [])
    {
        $limit = isset($options['limit']) ? $options['limit'] : '';

        try {
            $response = $this->client->get("history?limit={$limit}");
        } catch (RequestException $e) {
            throw new CbixException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    public function convert($amount, $from = 'CAD', $to = 'BTC')
    {
        try {
            $response = $this->client->get("convert?amount={$amount}&from={$from}&to={$to}");
        } catch (RequestException $e) {
            throw new CbixException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    public function news()
    {
        try {
            $response = $this->client->get("news");
        } catch (RequestException $e) {
            throw new CbixException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }
}