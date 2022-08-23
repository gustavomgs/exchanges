<?php

namespace Angrybot\Exchange;

use ccxt\binance;
use ccxt\bitfinex;
use ccxt\Exchange;
use ccxt\ExchangeError;
use Exception;

class ExchangeProvider
{

    public const BROKER_BINANCE  = 42;
    public const BROKER_BITFINEX = 43;

    public Exchange $exchange;
    public Exchange $privateExchange;
    public \ccxt\async\Exchange $privateAsyncExchange;

    public int $broker_id;
    public string $apiKey;

    public string $secretKey;


    /**
     * @throws ExchangeError
     */
    public function setExchange(): ExchangeProvider
    {
        if($this->broker_id == self::BROKER_BINANCE){

            $this->exchange = new binance([
                'enabledLimit' => true,
            ]);
        }

        if($this->broker_id == self::BROKER_BITFINEX){

            $this->exchange = new bitfinex([
                'enabledLimit' => true,
            ]);
        }

        if(!$this->exchange) throw new  ExchangeError('Error in exchange load');

        return $this;
    }

    /**
     * @return $this
     * @throws ExchangeError
     */
    public function setPrivateExchange(): ExchangeProvider
    {
        if($this->broker_id == self::BROKER_BINANCE){

            $this->privateExchange = new binance([
                'enabledLimit' => true,
                'apiKey' => $this->apiKey,
                'secret' => $this->secretKey,
            ]);
        }

        if($this->broker_id == self::BROKER_BITFINEX){

            $this->privateExchange = new bitfinex([
                'enabledLimit' => true,
                'apiKey' => $this->apiKey,
                'secret' => $this->secretKey,
            ]);
        }

        if(!$this->privateExchange) throw new  ExchangeError('Error in exchange load');

        return $this;
    }

    /**
     * @return $this
     * @throws ExchangeError
     */
    public function setAsyncPrivateExchange(): ExchangeProvider
    {
        if($this->broker->id == self::BROKER_BINANCE){

            $this->privateAsyncExchange = new \ccxt\async\binance([
                'enabledLimit' => true,
                'apiKey' => $this->apiKey,
                'secret' => $this->secretKey,
            ]);
        }

        if($this->broker->id == self::BROKER_BITFINEX){

            $this->privateAsyncExchange = new \ccxt\async\bitfinex([
                'enabledLimit' => true,
                'apiKey' => $this->apiKey,
                'secret' => $this->secretKey,
            ]);
        }

        if(!$this->privateAsyncExchange) throw new  Exception('Error in exchange load');

        return $this;
    }

}