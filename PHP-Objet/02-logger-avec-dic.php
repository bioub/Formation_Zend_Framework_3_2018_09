<?php

use Psr\Log\LoggerInterface;

require_once 'vendor/autoload.php';
$sm = require_once 'config-services.php';

function createUser(LoggerInterface $logger) {
    $logger->info('User created');
}

$logger = $sm->get(LoggerInterface::class);
createUser($logger);
