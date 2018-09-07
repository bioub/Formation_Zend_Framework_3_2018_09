<?php

return [
    'router' => [
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
    ],
    'service_manager' => [
        'factories' => [
            \Application\Service\ContactService::class => \Application\Service\InjectEntityManagerFactory::class,
            \Application\Service\CompanyService::class => \Application\Service\InjectEntityManagerFactory::class,
        ],
    ],
    'controllers' => [
        'factories' => [
            \Application\Controller\IndexController::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \Application\Controller\ContactController::class => \Application\Controller\SingleServiceControllerFactory::class,
            \Application\Controller\CompanyController::class => \Application\Controller\SingleServiceControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => false,
        'display_exceptions' => false,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        /*
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        */
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
