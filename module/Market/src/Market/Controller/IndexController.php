<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Market for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction() 
    {
        $view = new ViewModel();
        if($this->flashMessenger()->hasCurrentErrorMessages()) {
            $view->setVariable('flashMessages', $this->flashMessenger()->getErrorMessages());
        }
        
        $view->setVariable('messages', 'Welcome to the Online Market');
        return $view;
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /viewController/view-controller/foo
        return array();
    }
}
