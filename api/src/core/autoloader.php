<?php

class autoloader
{

    public static $loader;
    private static $_basePath = '../';

    public static function init()
    {
        if (self::$loader == NULL)
            self::$loader = new self();

        return self::$loader;
    }

    public function __construct()
    {
        spl_autoload_register(array($this, 'core'));
    }

    public function core($class_name)
    {
        //class directories
        $directories = array(
            '/',
            'controller/',
            'core/',
            'core/exception/',
            'core/security/',
            'core/database/',
            'core/configuration/',
            'model/entity/',
            'model/rule/',
        );

        //for each directory
        foreach ($directories as $directory) {
            $path = __DIR__ . '/' . self::$_basePath . $directory . $class_name . '.php';

            if (file_exists($path)) {
                require_once($path);
                return;
            }
        }
    }

}
