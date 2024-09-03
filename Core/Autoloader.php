<?php 

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }
    
    public static function autoload($className)
    {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);

        $file = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $path . '.php';

        
        if(file_exists($file) && is_readable($file)) {
            require_once $file;
        } else {
            // gestion d'erreur
            // ...
            // var_dump($file);
            exit();
        } 
               
        
    }
}

