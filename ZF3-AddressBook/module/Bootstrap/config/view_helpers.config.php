<?php

// Pas de fonction anonyme dans les fichiers de config (sinon pas de cache posssible)
return [
    'aliases' => [
        'btspAlert' => \Bootstrap\View\Helper\Alert::class,
        'btspAlertFlashMessenger' => \Bootstrap\View\Helper\AlertFlashMessenger::class,
        'btspButtonBack' => \Bootstrap\View\Helper\ButtonBack::class,
    ],
    'factories' => [
        \Bootstrap\View\Helper\ButtonBack::class => \Bootstrap\View\Helper\ButtonBackFactory::class,
        \Bootstrap\View\Helper\Alert::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
        \Bootstrap\View\Helper\AlertFlashMessenger::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
    ],
];