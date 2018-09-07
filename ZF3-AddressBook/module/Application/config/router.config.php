<?php

return [
    'routes' => [
        'home' => [
            'type' => \Zend\Router\Http\Literal::class,
            'options' => [
                'route' => '/',
                'defaults' => [
                    'controller' => \Application\Controller\IndexController::class,
                    'action' => 'index',
                ],
            ],
        ],
        'contact' => [
            'type' => \Zend\Router\Http\Literal::class,
            'options' => [
                'route' => '/contacts',
                'defaults' => [
                    'controller' => \Application\Controller\ContactController::class,
                    'action' => 'list',
                ],
            ],
            'may_terminate' => true,
            'child_routes' => [
                'show' => [
                    'type' => \Zend\Router\Http\Segment::class,
                    'options' => [
                        'route' => '/:id',
                        'constraints' => [
                            'id' => '[1-9][0-9]*',
                        ],
                        'defaults' => [
                            // 'controller' => Controller\ContactController::class,
                            'action' => 'showWithCompany',
                        ],
                    ],
                    'may_terminate' => true,
                    'child_routes' => [
                        'update' => [
                            'type' => \Zend\Router\Http\Literal::class,
                            'options' => [
                                'route' => '/update',
                                'defaults' => [
                                    // 'controller' => Controller\ContactController::class,
                                    'action' => 'update',
                                ],
                            ],
                        ],
                        'delete' => [
                            'type' => \Zend\Router\Http\Literal::class,
                            'options' => [
                                'route' => '/delete',
                                'defaults' => [
                                    // 'controller' => Controller\ContactController::class,
                                    'action' => 'delete',
                                ],
                            ],
                        ],
                    ],
                ],
                'add' => [
                    'type' => \Zend\Router\Http\Literal::class,
                    'options' => [
                        'route' => '/add',
                        'defaults' => [
                            // 'controller' => Controller\ContactController::class,
                            'action' => 'add',
                        ],
                    ],
                ],
            ],
        ],
        'company' => [
            'type' => \Zend\Router\Http\Literal::class,
            'options' => [
                'route' => '/companies',
                'defaults' => [
                    'controller' => \Application\Controller\CompanyController::class,
                    'action' => 'list',
                ],
            ],
            'may_terminate' => true,
            'child_routes' => [
                'show' => [
                    'type' => \Zend\Router\Http\Segment::class,
                    'options' => [
                        'route' => '/:id',
                        'constraints' => [
                            'id' => '[1-9][0-9]*',
                        ],
                        'defaults' => [
                            'action' => 'show',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
