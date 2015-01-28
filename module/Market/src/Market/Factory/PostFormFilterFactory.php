<?php
namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostFormFilter;

class PostFormFilterFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $filter = new PostFormFilter();
        $filter->setCategories($serviceLocator->get('categories'));
        $filter->buildFilter();
        return $filter;
    }
}

?>