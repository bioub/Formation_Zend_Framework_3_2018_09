<?php
require_once 'vendor/autoload.php';

function createUser(\Psr\Log\LoggerInterface $logger) {
    $logger->info('User created');
    $logger->log('info', 'User created');
}

// Nom complet de la class avec ses namespaces en prefix
// Fully Qualified Class Name (FQCN ou FQN)
$logger = new \Orsys\Logger\Logger();
createUser($logger);
