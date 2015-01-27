<?php
namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Controller\PostController;

class PostControllerFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $controller = new PostController();
        $controller->setCategories($serviceLocator->getServiceLocator()->get('categories'));
        return $controller;
    }
}

?>