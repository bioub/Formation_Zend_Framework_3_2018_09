<?php
require_once 'vendor/autoload.php';

function createUser(\Psr\Log\LoggerInterface $logger) {
    $logger->info('User created');
}

$logger = new \Orsys\Logger\Logger();
createUser($logger);
