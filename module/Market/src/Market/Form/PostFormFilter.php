<?php
namespace Market\Form;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;

class PostFormFilter extends InputFilter
{
    private $categories;
    
    public function buildFilter() {
        $titleFilter = new Input('title');
        $titleFilter->getFilterChain();
            $titleFilter->getFilterChain()->attach(new StringTrim());
            $titleFilter->getFilterChain()->attach(new StripTags());
            $titleFilter->getFilterChain()->attachByName('Alpha' , ['options' => ['allowWhiteSpace'=> true]]);
            $titleFilter->getValidatorChain()->attachByName('StringLength', ['options'=>['min'=>4,'max'=>20]]);
        
        $this->add($titleFilter);
        
    }
    
    public function setCategories($categories) {
        $this->categories = $categories;
    }
}

?>