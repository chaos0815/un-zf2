<?php
namespace Debug\Service;

class Timer 
{
    private $start = array();
    private $asFloat;
    
    public function __construct($asFloat=false) 
    {
        $this->asFloat = $asFloat;
    }
    
    /**
     * Start a timer
     */
    public function start($name) {
        $this->start[$name] = microtime($this->asFloat);
    }
    
    /**
     * Stop a timer
     * @return int
     */
    public function stop($name) {
        return microtime($this->asFloat) - $this->start[$name];
    }
}