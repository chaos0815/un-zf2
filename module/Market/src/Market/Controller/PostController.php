<?php
namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * PostController
 *
 * @author
 *
 * @version
 *
 */
class PostController extends AbstractActionController
{
    public $categories;

    /**
     * The default action - show the home page
     */
    public function indexAction()
    {
        // TODO Auto-generated PostController::indexAction() default action
        $viewmodel = new ViewModel(['categories' => $this->categories]);
        $viewmodel->setTemplate('market/post/invalid.phtml');
		return $viewmodel;
    }
    
    public function setCategories($categories) {
        $this->categories = $categories;
    }
}