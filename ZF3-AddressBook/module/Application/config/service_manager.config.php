<?php

return [
    'factories' => [
        \Application\Service\ContactService::class => \Application\Service\ContactServiceFactory::class,
        \Application\Service\CompanyService::class => \Application\Service\InjectEntityManagerFactory::class,
    ],
];
