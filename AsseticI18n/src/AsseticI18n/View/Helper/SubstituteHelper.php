<?php

namespace AsseticI18n\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Config\Config;

class SubstituteHelper extends AbstractHelper {
	public function __invoke($stringCode) {
		$targetLocale = $this->getTranslator ()->getLocale ();
		$primaryString = $this->getPrimaryString ( $stringCode );
		$translatedString = $this->getTranslator ()->translate ( $primaryString, 'default', $targetLocale );
		return $translatedString;
	}
	private function getPrimaryString($stringCode) {
		return $this->getPrimaryStringProvider ()->getPrimaryStringByCode ( $stringCode );
	}
	
	/**
	 *
	 * @return \AsseticI18n\Model\PrimaryStringProvider
	 */
	private function getPrimaryStringProvider() {
		return $this->getServiceLocator ()->get ( 'primary-string-provider' );
	}
	
	/**
	 *
	 * @return \Zend\Mvc\I18n\Translator
	 */
	private function getTranslator() {
		return $this->getServiceLocator ()->get ( 'translator' );
	}
	
	/**
	 *
	 * @return \Zend\ServiceManager\ServiceLocatorInterface
	 */
	private function getServiceLocator() {
		return $this->getView ()->getHelperPluginManager ()->getServiceLocator ();
	}
}