<?php
namespace Debug\Service;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TimerAbstractFactory implements AbstractFactoryInterface 
{
	/* (non-PHPdoc)
     * @see \Zend\ServiceManager\AbstractFactoryInterface::canCreateServiceWithName()
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $config = $serviceLocator->get('config');
        
        return isset($config['timer'][$name]);
    }

	/* (non-PHPdoc)
     * @see \Zend\ServiceManager\AbstractFactoryInterface::createServiceWithName()
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        // TODO Auto-generated method stub
        $config = $serviceLocator->get('config');
        $asFloat = $config['timer'][$name];
        
        $timer = new Timer($asFloat);
        return $timer;
    }

    
}