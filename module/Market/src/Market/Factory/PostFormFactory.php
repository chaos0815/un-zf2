<?php
namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostForm;

class PostFormFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new PostForm();
        $form->setCategories($serviceLocator->get('categories'));
        $form->setInputFilter($serviceLocator->get('market-post-filter'));
        $form->buildForm();
        return $form;
    }
}

?>