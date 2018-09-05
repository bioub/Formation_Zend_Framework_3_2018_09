<?php

$config = [
    'factories' => [
        \Psr\Log\LoggerInterface::class => function() { // factory (idéalement dans une classe Factory pour la mise en cache de config)
            $logger = new \Zend\Log\Logger();
            $writer = new \Zend\Log\Writer\Stream('app.log');
            $logger->addWriter($writer); // Lazy Load
            $psrLogger = new \Zend\Log\PsrLoggerAdapter($logger); // Adapter

            return $psrLogger;
        },
        /*\Psr\Log\LoggerInterface::class => function() {
            return new \Orsys\Logger\Logger();
        },*/
        \Orsys\Logger\Logger::class => \Zend\ServiceManager\Factory\InvokableFactory::class
    ],
];

return new \Zend\ServiceManager\ServiceManager($config); // Dependency Injection Container