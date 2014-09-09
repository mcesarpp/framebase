<?php

chdir(dirname(__DIR__));

require '/vendor/autoload.php';
require '/src/core/autoloader.php';

define('BASE_SYS_PATH', __DIR__ . '/../');

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use core\database\doctrine;

return ConsoleRunner::createHelperSet(doctrine::getEntityManager());

