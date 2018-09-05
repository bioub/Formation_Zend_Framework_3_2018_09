<?php

namespace Bootstrap;


use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements BootstrapListenerInterface, ConfigProviderInterface, ViewHelperProviderInterface
{

    /**
     * Listen to the bootstrap event
     *
     * @param EventInterface $e
     * @return array
     */
    public function onBootstrap(EventInterface $e)
    {
        // TODO: Implement onBootstrap() method.
    }

    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        return [
            'service_manager' => include __DIR__ . '/../config/service_manager.config.php',
            'view_helpers' => include __DIR__ . '/../config/view_helpers.config.php',
        ];
    }

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getViewHelperConfig()
    {
        return [
            /*
            'factories' => [
                'btspAlert' => function() {
                    return new \Bootstrap\View\Helper\Alert();
                }
            ]
            */
        ];
    }
}