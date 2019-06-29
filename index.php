<?php
// Autoload des classes
spl_autoload_register(function ($class) {
    if(file_exists(__DIR__. '/classes/' . $class . '.php')) {
        require_once __DIR__ . '/classes/' . $class . '.php';
    }
    else if(file_exists(__DIR__. '/controllers/' . $class . '.php')) {
        require_once __DIR__ . '/controllers/' . $class . '.php';
    }
    else if(file_exists(__DIR__. '/models/' . $class . '.php')) {
        require_once __DIR__ . '/models/' . $class . '.php';
    }
});

// loading routes
require_once 'routes.php';
