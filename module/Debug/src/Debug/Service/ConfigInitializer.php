<?php
namespace Debug\Service;

use Zend\ServiceManager\InitializerInterface;

class ConfigInitializer implements InitializerInterface 
{
	/* (non-PHPdoc)
     * @see \Zend\ServiceManager\InitializerInterface::initialize()
     */
    public function initialize($instance, \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        /**
         *   
         *   AbstractController
         *   .servicemanager
         *   .eventmanager
         *   
         *   
         *   
         *   
         */
        
        if($instance instanceof ConfigAwareInterface) {
            $instance->setConfig($serviceLocator->get('config'));
        }
        
    }

    
}