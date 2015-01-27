<?php
use Zend\Test\PHPUnit\Controller\AbstractControllerTestCase;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
// Case Dependency Injection
class StandardDI
{
    private $object; 
    
    public function __construct($object) {
        $this->object = $object;
    }
    
    public function a() {
        return $this->object;
    }
    
    public function b() {
        
    }
}

$x = new StandardDI($b);
$x->b();

// More flexible dependency Injection
class GetterSetterDI {
    private $object;
    
    public function setObject($object) {
        $this->object = $object;
    }
    
    public function getObject() {
        return $this->object;
    }
}

// ServiceLocator / Service Manger
class ServiceManageDI {
    private $serviceManager;

    public function a() {
        $this->serviceManager->get('anotherObject');
    }

    public function getObject() {
        return $this->object;
    }
}

// Testabily and better performance!

class TestController extends AbstractController {
    public function setModel($object) {
        $this->object = $object;
    }
    
    public function getModel() {
        if(!$this->object) {
            $this->object = $this->serviceManager->get('anotherObject');
        }
        
        return $this->object;
    } 
}

$testController = new TestController();
$testController->setModel($mockModel);



