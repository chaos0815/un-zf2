<?php
namespace Debug;

use Zend\Mvc\MvcEvent;
use Zend\View\Model\ViewModel;
class Module 
{
    public function onBootstrap(MvcEvent $event) {
        $eventManager = $event->getApplication()->getEventManager();
        
        // @todo: how much time the ROUTing takes?
        $eventManager->attach('*', array($this, 'preEvent'), 999);
        $eventManager->attach('*', array($this, 'postEvent'), -999);
        
        $eventManager->attach(MvcEvent::EVENT_RENDER, array($this, 'debugOverlay'), 2);
        
        $sharedEventManager = $eventManager->getSharedManager();
        
        $sharedEventManager->attach('radio1', '*', function($event) {
            $name = $event->getName();
            $time = $event->getParam('time');
        });
        
        $eventManager->attach(MvcEvent::EVENT_ROUTE, array($this, 'postRoute'), -999);
    }
    
    public function debugOverlay(MvcEvent $event)
    {
        $viewModel = $event->getViewModel();
        
        $debugOverlayModel = new ViewModel();
        $debugOverlayModel->setTemplate('debug/overlay');
        $debugOverlayModel->addChild($viewModel, 'content');
        
        $debugOverlayModel->setVariable('dbprofiler', array());
        
        $event->setViewModel($debugOverlayModel);
    }
    
    public function postRoute(MvcEvent $event) 
    {
        $match = $event->getRouteMatch();
        if(!$match) {
            return null;
        }
        
        $controller = $match->getParam('controller');
        $action = $match->getParam('action');
        $usePageCache = $match->getParam('pagecache', false);
        
        //$acl = $event->getApplication()->getServiceManager()->get('acl');
        
        // @TODO: Access Control Lists
        // $isAllowed = $acl->isAllowed($role, $controller, $action);
        $isAllowed = true;
        if(!$isAllowed) {
            $response = $event->getResponse();
            // @TODO:
            //$referel = $event->getRequest();
            // $response->setHeader('Location', '/access/denied?$referel');
            //return $response;
            
            //Option 1: Internal redirect deny user from access
            $match->setParam('controller', 'access');
            $match->setParam('action', 'denied');
            
            
        }
        // @TODO: Page Cache
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