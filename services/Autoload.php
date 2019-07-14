<?php

namespace App\services;
class Autoload
{
    public function loadClass($className)
    {
        $line = substr($className,4);
        $file = "../{$line}.php";
        if (file_exists($file)) {
            include $file;
        }
    }
}