<?php
return [
    'driver' => [
        // defines an annotation driver with two paths, and names it `my_annotation_driver`
        'my_annotation_driver' => [
            'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
            'cache' => 'array',
            'paths' => [
                __DIR__ . '/../src/Entity'
            ],
        ],

        // default metadata driver, aggregates all other drivers into a single one.
        // Override `orm_default` only if you know what you're doing
        'orm_default' => [
            'drivers' => [
                // register `my_annotation_driver` for any entity under namespace `My\Namespace`
                'Application\\Entity' => 'my_annotation_driver',
            ],
        ],
    ],
];