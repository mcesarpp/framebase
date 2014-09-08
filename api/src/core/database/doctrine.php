<?php

namespace core\database;

use core\configuration\configuration;

class doctrine
{

    protected static $_instances = array();
    protected $current_instance_identifier = 'default';
    protected $entityManager = null;

    public static function getInstance($instance_identifier = 'default')
    {
        if (!isset(self::$_instances[$instance_identifier]))
            self::$_instances[$instance_identifier] = new self($instance_identifier);

        return self::$_instances[$instance_identifier];
    }

    protected function __construct($instance_ideitifier = 'default')
    {
        $this->current_instance_identifier = $instance_ideitifier;
    }

    /**
     * 
     * @param type $instance_ideitifier
     * @return \Doctrine\ORM\EntityManager
     */
    public static function getEntityManager($instance_ideitifier = 'default')
    {
        return doctrine::getInstance($instance_ideitifier)->getInstanceEntityManager();
    }

    public function getInstanceEntityManager()
    {
        if ($this->entityManager == null) {

            $isDevmode = true;

            $doctrineConf = configuration::getConfig('doctrine');

            $doctrineConfig = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($doctrineConf['annotation_path'], $isDevmode, null, null, false);
            $this->entityManager = \Doctrine\ORM\EntityManager::create($doctrineConf['dbParams'], $doctrineConfig);
        }
        return $this->entityManager;
    }

}
