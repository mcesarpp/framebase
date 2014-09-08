<?php

/**
 * Description of tokenRule
 *
 * @author Provisorio
 */
use core\database\doctrine;
use core\configuration\configuration;

class userRule
{

    static public function isValidPassword($rawPassword, $encodedPassword, $salt)
    {
        return true;
        return md5($rawPassword . $salt) === $encodedPassword;
    }

}
