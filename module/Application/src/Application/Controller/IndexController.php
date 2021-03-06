<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManager;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $controllerName = $this->params('controller');
        
        $eventManager = new EventManager('radio1');
        $eventManager->trigger('weatherforcast', $this, array('time'=> time()) ) ;
        
        $viewModel = new ViewModel();
        
        if($this->flashMessenger()->hasCurrentErrorMessages()) {
            $viewModel->setVariable('flashMessages', $this->flashMessenger()->getErrorMessages());
        }
        
        return $viewModel;
    }
    
}
