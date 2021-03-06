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

    public function test_summary_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/summary.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $cbix = new Cbix\CbixCore($this->client);
        $result = $cbix->summary();

        $this->assertEquals('Canadian Bitcoin Index', $result->source);
    }

    public function test_summary_throws_an_exception()
    {
        $this->setExpectedException('Cbix\CbixException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $cbix = new Cbix\CbixCore($this->client);
        $cbix->summary();
    }

    public function test_orderbook_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/orderbook.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $cbix = new Cbix\CbixCore($this->client);
        $result = $cbix->orderbook(['limit' => 25]);

        $this->assertEquals('Canadian Bitcoin Index', $result->source);
        $this->assertCount(25, $result->data->asks);
    }

    public function test_orderbook_throws_an_exception()
    {
        $this->setExpectedException('Cbix\CbixException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $cbix = new Cbix\CbixCore($this->client);
        $cbix->orderbook(['limit' => 25]);
    }

    public function test_volatility_returns_correct_response()
    {
        $mock = new GuzzleHttp\Subscriber\Mock([
            __DIR__ . '/mock/volatility.txt'
        ]);

        $this->client->getEmitter()->attach($mock);

        $cbix = new Cbix\CbixCore($this->client);
        $result = $cbix->volatility(['limit' => 10]);

        $this->assertCount(10, $result->series);
    }

    public function test_volatility_throws_an_exception()
    {
        $this->setExpectedException('Cbix\CbixException');

        $mock = new GuzzleHttp\Subscriber\Mock([
            new GuzzleHttp\Message\Response(400),
        ]);

        $this->client->getEmitter()->attach($mock);

        $cbix = new Cbix\CbixCore($this->client);
        $cbix->volatility(['limit' => 10]);
    }
}
