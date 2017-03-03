<?php
namespace AsseticI18n\Model;

use AsseticI18n\Error\MissingTextEntryException;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

class PrimaryStringProvider
{
    use ServiceLocatorAwareTrait;

    public function getPrimaryStringByCode($stringCode)
    {
        $config = $this->getConfig();
        if (isset($config[$stringCode])) {
            return $config[$stringCode];
        }

        throw new MissingTextEntryException($stringCode);
    }

    /**
     *
     * @return array
     */
    private function getConfig()
    {
        $config = $this->getServiceLocator()->get('Config');
        if (!array_key_exists('text', $config)) {
            throw new \Exception("No text entry provided in Zend Configuration files");
        }
        return $config['text'];
    }
}
