<?php namespace Cbix;

interface CbixInterface
{
    public function index();

    public function history($options = []);

    public function convert($amount, $from = 'CAD', $to = 'BTC');

    public function news();

    public function summary();

    public function orderbook($options = []);

    public function volatility($options = []);
}