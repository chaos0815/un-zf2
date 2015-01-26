<?php
namespace Debug;

use Zend\Mvc\MvcEvent;
class Module 
{
    public function onBootstrap(MvcEvent $event) {
        $eventManager = $event->getApplication()->getEventManager();
        
        // @todo: how much time the ROUTing takes?
        $eventManager->attach(MvcEvent::EVENT_ROUTE, array($this, 'preRoute'), 999);
        $eventManager->attach(MvcEvent::EVENT_ROUTE, array($this, 'postRoute'), -999);
    
        $sharedEventManager = $eventManager->getSharedManager();
        
        $sharedEventManager->attach('radio1', '*', function($event) {
            $name = $event->getName();
            $time = $event->getParam('time');
        });
    }
    
    public function preRoute(MvcEvent $event) 
    {
        $serviceManager = $event->getApplication()->getServiceManager();
        $timer = $serviceManager->get('timer');
        $timer->start();
    }
    
    public function postRoute(MvcEvent $event)
    {   
        $serviceManager = $event->getApplication()->getServiceManager();
        $timer = $serviceManager->get('timer');
        $elapsedTime = $timer->stop(); 
        
        error_log('Elapsed Time:'.$elapsedTime);
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