<?php

include_once 'PrimeClass.php';

// position [0] is the script's file name
array_shift($argv);
$className = array_shift($argv);
$funcName = array_shift($argv);

echo "\n Calling '$className::$funcName'...\n";

echo call_user_func_array(array($className, $funcName), $argv);


?>