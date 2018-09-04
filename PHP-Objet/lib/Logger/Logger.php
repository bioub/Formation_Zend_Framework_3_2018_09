<?php

namespace Orsys\Logger;


use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;
use Psr\Log\LogLevel;

class Logger implements LoggerInterface
{
    use LoggerTrait;

    protected $handler;

    public function __construct()
    {
        $this->handler = fopen('app.log', 'a');
    }

    public function __destruct()
    {
        fclose($this->handler);
    }


    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        fwrite($this->handler, "$message\n");
    }
}