<?php
namespace Debug\Controller;

use Zend\Stdlib\DispatchableInterface;
use Zend\View\Model\ViewModel;

class TestController implements DispatchableInterface
{
    /*
     * (non-PHPdoc)
     * @see \Zend\Stdlib\DispatchableInterface::dispatch()
     */
    public function dispatch(\Zend\Stdlib\RequestInterface $request, \Zend\Stdlib\ResponseInterface $response = null)
    {
        return $this->redirect()->toRoute('application/default', array(
            'controller'
        ));
        
        return $this->forward()->dispatch('Application\Controller\Index', array(
            'action' => 'index'
        ));
        
        // 1. Return array - standard behaviour
        $return = array(
            'name' => 'Heiko'
        );
        
        // 2. Return view model - - standard behaviour
        $viewModel = new ViewModel();
        $viewModel->setVariables($return);
        
        // 3. Return view model with template - changes the template to be rendered
        $viewModel->setTemplate('application/company/about');
        
        // 4. Return view model disabling further rendering of other view models
        // Disables the layout
        // $viewModel->setTerminal(true);
        
        return $viewModel;
        
        // 5. Return instance of response object
        // Skips completely the rendering.
        /*
         * $response = $this->getResponse();
         * $response->setContent(file_get_contents($filename));
         * $response->setHeader(...);
         *
         * return $this->getResponse();
         */
    }
}