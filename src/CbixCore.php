<?php namespace Cbix;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * Class CbixCore
 * @package Cbix
 */
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

    /**
     * @return mixed
     * @throws CbixException
     */
    public function index()
    {
        try {
            $response = $this->client->get("index");
        } catch (RequestException $e) {
            throw new CbixException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    /**
     * @param array $options
     * @return mixed
     * @throws CbixException
     */
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

    /**
     * @param $amount
     * @param string $from
     * @param string $to
     * @return mixed
     * @throws CbixException
     */
    public function convert($amount, $from = 'CAD', $to = 'BTC')
    {
        try {
            $response = $this->client->get("convert?amount={$amount}&from={$from}&to={$to}");
        } catch (RequestException $e) {
            throw new CbixException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    /**
     * @return mixed
     * @throws CbixException
     */
    public function news()
    {
        try {
            $response = $this->client->get("news");
        } catch (RequestException $e) {
            throw new CbixException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    /**
     * @return mixed
     * @throws CbixException
     */
    public function summary()
    {
        try {
            $response = $this->client->get("summary");
        } catch (RequestException $e) {
            throw new CbixException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    /**
     * @param array $options
     * @return mixed
     * @throws CbixException
     */
    public function orderbook($options = [])
    {
        $limit = isset($options['limit']) ? $options['limit'] : '';

        try {
            $response = $this->client->get("orderbook?limit={$limit}");
        } catch (RequestException $e) {
            throw new CbixException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }

    /**
     * @param array $options
     * @return mixed
     * @throws CbixException
     */
    public function volatility($options = [])
    {
        $limit = isset($options['limit']) ? $options['limit'] : '';

        try {
            $response = $this->client->get("volatility?limit={$limit}");
        } catch (RequestException $e) {
            throw new CbixException($e->getResponse()->getbody());
        }

        return json_decode($response->getBody());
    }
}