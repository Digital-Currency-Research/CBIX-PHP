<?php

class ChainCoreTest extends \Guzzle\Tests\GuzzleTestCase
{
    private $client;

    public function setUp()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function test_index_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/index.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $cbix = new Cbix\CbixCore($this->client);
        $result = $cbix->index();

        $this->assertEquals(1412803980, $result->timestamp);
        $this->assertCount(3, $result->exchanges);
    }

    public function test_index_throws_an_exception()
    {
        $this->setExpectedException('Cbix\CbixException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $cbix = new Cbix\CbixCore($this->client);
        $cbix->index();
    }

    public function test_history_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/history.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $cbix = new Cbix\CbixCore($this->client);
        $result = $cbix->history(['limit' => 100]);

        $this->assertEquals('Canadian Bitcoin Index History', $result->source);
        $this->assertCount(100, $result->data);
    }

    public function test_history_throws_an_exception()
    {
        $this->setExpectedException('Cbix\CbixException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $cbix = new Cbix\CbixCore($this->client);
        $cbix->history(['limit' => 100]);
    }

    public function test_convert_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/convert.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $cbix = new Cbix\CbixCore($this->client);
        $result = $cbix->convert(500, 'CAD', 'BTC');

        $this->assertEquals(0.25617379, $result->result);
    }

    public function test_convert_throws_an_exception()
    {
        $this->setExpectedException('Cbix\CbixException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $cbix = new Cbix\CbixCore($this->client);
        $cbix->convert(500, 'CAD', 'BTC');
    }

    public function test_news_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/news.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $cbix = new Cbix\CbixCore($this->client);
        $result = $cbix->news();

        $this->assertEquals('Canadian Bitcoin Index', $result->source);
        $this->assertCount(15, $result->data);
    }

    public function test_news_throws_an_exception()
    {
        $this->setExpectedException('Cbix\CbixException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $cbix = new Cbix\CbixCore($this->client);
        $cbix->news();
    }
}
