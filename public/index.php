<?php



const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';


//now that i am using a namespace class the logic has to change.


spl_autoload_register(function ($class) {

    //Core\Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    
    require base_path("{$class}.php");
   
});



require base_path('Core/router.php');

