<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{

    public function getConfig()
    {
        $files = scandir(__DIR__ . '/../config');

        $config = [];

        foreach ($files as $f) {
            $matches = [];
            $result = preg_match('/([a-zA-Z0-9_-]+)\.config\.php$/', $f, $matches);
            if ($result === 0) {
                continue;
            }

            $configKey = $matches[1];

            $config[$configKey] = include __DIR__ . '/../config/' . $f;
        }

        return $config;
    }

}
