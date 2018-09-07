<?php

return [
    'factories' => [
        \Application\Controller\IndexController::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
        \Application\Controller\ContactController::class => \Application\Controller\SingleServiceControllerFactory::class,
        \Application\Controller\CompanyController::class => \Application\Controller\SingleServiceControllerFactory::class,
    ],
];
