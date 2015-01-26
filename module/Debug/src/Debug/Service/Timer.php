<?php
namespace Debug\Service;

class Timer 
{
    private $start;
    private $asFloat;
    
    public function __construct($asFloat=false) 
    {
        $this->asFloat = $asFloat;
    }
    
    /**
     * Start a timer
     */
    public function start() {
        $this->start = microtime($this->asFloat);
    }
    
    /**
     * Stop a timer
     * @return int
     */
    public function stop() {
        return microtime($this->asFloat) - $this->start;
    }
}