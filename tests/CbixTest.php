<?php

class CbixTest extends PHPUnit_Framework_TestCase
{
    public function test_make_returns_an_instance_of_cbix_core()
    {
        $client = \Cbix\Cbix::make();

        $this->assertInstanceOf('Cbix\CbixCore', $client);
    }
}