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
    }
    
    public function preRoute(MvcEvent $event) 
    {
        $event->setParam('start', microtime(true));
    }
    
    public function postRoute(MvcEvent $event)
    {
        $elapsedTime = microtime(true) - $event->getParam('start'); 
        error_log('Elapsed Time:'.$elapsedTime);
    }
}