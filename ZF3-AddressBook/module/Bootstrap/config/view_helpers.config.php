<?php

// Pas de fonction anonyme dans les fichiers de config (sinon pas de cache posssible)
return [
    'aliases' => [
        'btspAlert' => \Bootstrap\View\Helper\Alert::class,
    ],
    'factories' => [
        \Bootstrap\View\Helper\Alert::class => \Zend\ServiceManager\Factory\InvokableFactory::class
    ]
    /*
    Le plus performant serait de créer une factory directement (sans alias)
    'factories' => [
        'btspAlert' => \Bootstrap\View\Helper\AlertFactory::class,
    ]
    */
];