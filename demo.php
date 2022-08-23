<?php

use Angrybot\Exchange\ExchangeProvider;

require __DIR__ . '/vendor/autoload.php';

$exchange = new ExchangeProvider;
$exchange->broker_id = ExchangeProvider::BROKER_BITFINEX;

$exchange->setExchange();

$result = $exchange->exchange->fetch_ticker('BTC/USD');

$exchange->apiKey = 'apiKey_example';
$exchange->secretKey = 'secretKey_example';

$exchange->setPrivateExchange();

$result = $exchange->privateExchange->fetch_my_trades('BTC/USDT');
