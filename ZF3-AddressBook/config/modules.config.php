<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

/**
 * List of enabled modules for this application.
 *
 * This should be an array of module namespaces used in the application.
 */
return [
    'Zend\Session',
    'Zend\Cache',
    'Zend\Hydrator',
    'Zend\I18n',
    'Zend\InputFilter',
    'Zend\Filter',
    'Zend\Form',
    'Zend\Paginator',
    'Zend\Mvc\Plugin\Prg',
    'Zend\Mvc\Plugin\Identity',
    'Zend\Mvc\Plugin\FlashMessenger',
    'Zend\Mvc\Plugin\FilePrg',
    'Zend\Router',
    'Zend\Validator',
    'DoctrineModule',
    'DoctrineORMModule',
    'Bootstrap',
    'Application', // nos modules à la fin
    // pour la priorité des config
];
