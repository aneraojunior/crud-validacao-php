<?php

spl_autoload_register(function($nameClass)
{
    $dirName = "classes";
    $filename = $dirName . DIRECTORY_SEPARATOR . $nameClass . ".class.php";

    if(file_exists($filename))
    {
        require_once($filename);
    }
});