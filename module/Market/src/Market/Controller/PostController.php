<?php
namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Market\Form\PostForm;
use Market;

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
     * @var PostForm
     */
    private $postForm;

    /**
     * The default action - show the home page
     */
    public function indexAction()
    {
        $this->postForm->setAttributes(array(
            'method' => 'POST',
            'action' => $this->url()->fromRoute('market-post'),
        ));
        
        $postData = $this->params()->fromPost();
        $this->postForm->setData($postData);
        
        $viewmodel = new ViewModel([
            'categories' => $this->categories,
            'postData' => $postData,
            'postForm' => $this->postForm,
        ]);
        $viewmodel->setTemplate('market/post/index.phtml');
        if ($this->getRequest()->isPost()) {
            if (!$this->postForm->isValid()) {
                $this->flashMessenger()->addErrorMessage($this->postForm->getMessages());
                
                $invalidViewModel = new ViewModel();
                $invalidViewModel->setTemplate('market/post/invalid.phtml');
                
                $invalidViewModel->addChild($viewmodel, 'child');
                
                return $invalidViewModel;
            }
        }
        
        
        return $viewmodel;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function setPostForm(Market\Form\PostForm $form)
    {
        $this->postForm = $form;
    }
}