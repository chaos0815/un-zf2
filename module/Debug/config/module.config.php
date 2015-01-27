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
    
    'controllers' => array(
        'invokables' => array (
            'debug-test' => 'Debug\Controller\TestController',
        )
    ),
    
    'router' => array(
        'routes' => array(
            // @TODO:: Add routing to the debug\test controller
        )
    ),
    
    'controller_plugins' => array(
        'invokables' => array (
            'timer' => 'Debug\Service\Timer'
        )
    ),
    
    'timer' => array (
        'timer' => false,
        'timer-float' => true,
    ),
    
    'view_manager' => array(
        'template_map' => array(
            'debug/overlay' => __DIR__.'/../view/overlay.phtml',
        )
    )
);