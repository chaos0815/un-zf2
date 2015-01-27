<?php
namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * ViewController
 *
 * @author
 *
 * @version
 *
 */
class ViewController extends AbstractActionController
{

    /**
     * The default action - show the home page
     */
    public function indexAction()
    {
        $category = $this->params()->fromRoute('category');
        // TODO Auto-generated ViewController::indexAction() default action
        return new ViewModel(['category'=>$category]);
    }
    
    public function itemAction() {
        $itemId = $this->params()->fromRoute('itemId');
        
        if (empty($itemId)) {
            $this->flashMessenger()->addErrorMessage("Item not found");
            return $this->redirect()->toRoute('home');
        }
        return new ViewModel(['itemId'=>$itemId]);
    }
}