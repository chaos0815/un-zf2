<?php
namespace Market\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Select;

class PostForm extends Form
{
    
    private $categories;
    
    public function buildForm() {
        $this->setName('postForm');
        $category = new Select('category');
        $category->setLabel('Catgeory')
            ->setValueOptions($this->categories)
            ->setAttributes(['title' => 'Category']);
        
        $title = new Text('title');
        $title->setLabel('Title')
            ->setAttributes(['title' => 'Title']);
        
        $submit = new Submit('submit');
        $submit->setValue("submit");
        
        $this->add($category)->add($title)->add($submit);
    }
    
    public function setCategories($categories) {
        $this->categories = $categories;
    }
}

?>