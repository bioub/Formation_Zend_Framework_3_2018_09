<?php
require_once 'vendor/autoload.php';
$sm = require_once 'config-services.php';

function createUser(\Psr\Log\LoggerInterface $logger) {
    $logger->info('User created');
}

$logger = $sm->get(\Psr\Log\LoggerInterface::class);
createUser($logger);
