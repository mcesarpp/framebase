<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * Description of bootstrap
 *
 * @author Provisorio
 */
class bootstrap
{

    public function getApp()
    {
        return \Slim\Slim::getInstance();
    }

    public function getApplicationConfig()
    {
        if ($this->getApp()->config('app') === null) {
            $this->getApp()->config('app', include __DIR__ . 'config/application.config.php');
        }

        return $this->getApp()->config('app');
    }

    public function bootstrap()
    {
        
    }

    public function bootstrap_doctrine()
    {

        $appConfig = $this->getApplicationConfig();
        $appConfig['doctrine'][];
        
        $doctrineConfig = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/src", true));
    }

}
