<?php

return [
    'factories' => [
        \Application\Form\ContactForm::class => \Application\Service\InjectEntityManagerFactory::class,
    ]
];