<?php
namespace Application\Helper;

use Zend\View\Helper\AbstractHelper;

class LeftLinks extends AbstractHelper
{
    
    public function __invoke($values, $urlPrefix) {
        $result = "<ul>";
        
        foreach ($values as $value) {
            $result .= '<li>';
            $result .= '<a href="'.$urlPrefix.'/'.$value.'">'.$value.'</a></li>';
        }
        
        $result .= "</ul>";
        
        return $result;
        
    }
}

?>