<?php

namespace AsseticI18n\Listener;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Factory to build AsseticI18nConfigModifier instance and inject service locator as dependency
 */
class AsseticI18nConfigModifierFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $configModifier = new AsseticI18nConfigModifier();
        $configModifier->setServiceLocator($serviceLocator);
        return $configModifier;
    }
}
