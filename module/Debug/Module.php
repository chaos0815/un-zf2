<?php
namespace Debug;

use Zend\Mvc\MvcEvent;
class Module 
{
    public function onBootstrap(MvcEvent $event) {
        $eventManager = $event->getApplication()->getEventManager();
        
        // @todo: how much time the ROUTing takes?
        $eventManager->attach('*', array($this, 'preEvent'), 999);
        $eventManager->attach('*', array($this, 'postEvent'), -999);
        
        $sharedEventManager = $eventManager->getSharedManager();
        
        $sharedEventManager->attach('radio1', '*', function($event) {
            $name = $event->getName();
            $time = $event->getParam('time');
        });
    }
    
    public function preEvent(MvcEvent $event) 
    {
        $name = $event->getName();
        $serviceManager = $event->getApplication()->getServiceManager();
        $timer = $serviceManager->get('timer');
        $timer->start($name);
    }
    
    public function postEvent(MvcEvent $event)
    {   
        $name = $event->getName();
        $serviceManager = $event->getApplication()->getServiceManager();
        $timer = $serviceManager->get('timer');
        $elapsedTime = $timer->stop($name); 
        
        error_log(sprintf('Elapsed Time: %s: %s', $name, $elapsedTime));
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}