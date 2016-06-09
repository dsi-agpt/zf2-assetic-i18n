<?php

namespace AsseticI18n\Model;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

/**
 * Factory to build PrimaryStringProvider instance and inject service locator as dependency
 */
class PrimaryStringProviderFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $provider = new PrimaryStringProvider();
        $provider->setServiceLocator($serviceLocator);
        return $provider;
    }
}

