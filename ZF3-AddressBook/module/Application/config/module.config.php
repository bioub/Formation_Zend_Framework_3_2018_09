<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'contact' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/contacts',
                    'defaults' => [
                        'controller' => Controller\ContactController::class,
                        'action' => 'list',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'show' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/:id',
                            'constraints' => [
                                'id' => '[1-9][0-9]*',
                            ],
                            'defaults' => [
                                // 'controller' => Controller\ContactController::class,
                                'action' => 'show',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'update' => [
                                'type' => Literal::class,
                                'options' => [
                                    'route' => '/update',
                                    'defaults' => [
                                        // 'controller' => Controller\ContactController::class,
                                        'action' => 'update',
                                    ],
                                ],
                            ],
                            'delete' => [
                                'type' => Literal::class,
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
                        'type' => Literal::class,
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
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\ContactController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => false,
        'display_exceptions'       => false,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
