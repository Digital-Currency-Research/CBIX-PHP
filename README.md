CBIX-PHP
========

[![Build Status](https://travis-ci.org/Digital-Currency-Research/CBIX-PHP.svg)](https://travis-ci.org/Digital-Currency-Research/CBIX-PHP)
[![Code Climate](https://codeclimate.com/github/Digital-Currency-Research/CBIX-PHP/badges/gpa.svg)](https://codeclimate.com/github/Digital-Currency-Research/CBIX-PHP)
[![Test Coverage](https://codeclimate.com/github/Digital-Currency-Research/CBIX-PHP/badges/coverage.svg)](https://codeclimate.com/github/Digital-Currency-Research/CBIX-PHP)

This library provides a simple PHP interface to the [Canadian Bitcoin Index API](https://www.cbix.ca/api).

### Installing via Composer

The recommended way to install the library is through [Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php

# Add Chain-PHP as a dependency
php composer.phar require cbix/cbix-php:dev-master
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

### Setup

Simply call the make method on the Cbix class.

    $cbix = Cbix::make();

### Methods

All methods of the [CBIX API](https://www.cbix.ca/api) are supported and more will be added when fully supported.

    $index = $cbix->index;
    $history = $cbix->history(['limit=100']);
    $convert = $cbix->convert(500, 'CAD', 'BTC');
    $news = $cbix->news();
    $summary = $cbix->summary();
    $orderbook = $cbix->orderbook(['limit=25']);

## Exceptions

If there are any issues during the API request a CbixException will be thrown which can be caught
and managed according to your application needs.

    try {
        $index = $cbix->index();
        echo $index->index->value;
    } catch (CbixException $e) {
        //There was an error more information in $e->getMessage();
        var_dump($e->getMessage());
    }

## Unit Tests

This library uses PHPUnit for unit testing. In order to run the unit tests, you'll first need
to install the dependencies of the project using Composer: `php composer.phar install --dev`.
You can then run the tests using `vendor/bin/phpunit`. The library comes with a set of mocked responses
from the CBIX API for running the unit tests.

## Contributions

Patches, bug fixes, feature requests, and pull requests are welcome.