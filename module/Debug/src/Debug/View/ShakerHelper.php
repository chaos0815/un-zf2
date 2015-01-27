<?php
namespace Debug\View;

use Zend\View\Helper\AbstractHelper;

class ShakerHelper extends AbstractHelper {
    public function __invoke($number) 
    {
        $view = $this->getView();
        
        return "<h1>".$view->escapeHtml($number)."</h1>";
    }
}
