<?php

// require_once "app/A.php";
// require_once "classes/A.php";

// use classes\A;
// use classes\test\B;

// spl_autoload_register(function ($class){
//     var_dump($class);
//     $filename = str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
//     var_dump($filename);
//     // $filename = "{$class}.php";
//     require_once $filename;
//     // echo "app/{$class}.php";
// });


require __DIR__ . "/vendor/autoload.php";

new app\A();
new base\A();
new base\B();
test();
