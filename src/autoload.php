<?php
spl_autoload_register(function($class) {
    $localClass = "class/{$class}.class.php";
    $mySqlClass = "../PHP-MySql/{$class}.class.php";

    if (file_exists($localClass)) {
        require_once($localClass);
        return true;
    }

    if (file_exists($mySqlClass)) {
        require_once($mySqlClass);
        return true;
    }
    
    echo $class;
    return false;
    
})
?>