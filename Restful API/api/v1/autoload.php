<?php

function load_lib($base) {
    $baseName = explode( '\\', $base );
    $class = end( $baseName ); 
     
    if (is_file('models/'.$class . '.php')) {
        include 'models/'.$class . '.php';
    } else {
        throw new InvalidArgumentException($class . ' Not Found');
    }
      
};
spl_autoload_register('load_lib');