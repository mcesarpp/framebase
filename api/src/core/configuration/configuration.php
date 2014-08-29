<?php

namespace core\configuration;

/**
 * Description of configuration
 *
 * @author Provisorio
 */
class configuration
{

    protected static $_instance = null;
    protected static $_sysConf = null;

    public static function getInstance()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    protected function __construct()
    {
        self::$_sysConf = self::getStaticConfigurations();
    }

    public static function getStaticConfigurations()
    {
        $array = include BASE_SYS_PATH . 'config/application.config.php';
        return $array;
    }

    static public function getConfig($configIdentifier)
    {
        $instance = self::getInstance();
        return isset(self::$_sysConf[$configIdentifier]) ? self::$_sysConf[$configIdentifier] : false;
    }

}
