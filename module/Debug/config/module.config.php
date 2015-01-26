<?php
return array(
    'service_manager' => array(
        'invokables' => array (
           // 'timer' => 'Debug\Service\Timer',
           
        ),
        
        'factories' => array (
            //'timer' => 'Debug\Service\TimerFactory',
            //'timer-int' => 'Debug\Service\TimerIntFactory',
        ),
        
        'aliases' => array (
            'user.db.adapter' => 'application.db.adapter',
        ),
        
        'abstract_factories' => array(
            'Debug\Service\TimerAbstractFactory',
        ),
        
        'initilizers' => array (
            'Debug\Service\ConfigInitializer',
        ),
        
        'shared' => array(
            
        ),
        
        // 
        'igors-array' => array (
        
        
        )
    ),
    
    'timer' => array (
        'timer' => false,
        'timer-float' => true,
    )
);