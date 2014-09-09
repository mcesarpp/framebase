<?php

/**
 * Description of tokenRule
 *
 * @author Provisorio
 */
use core\database\doctrine;
use core\configuration\configuration;

class tokenRule
{

    public function getUserToken($email, $password)
    {
        $em = doctrine::getEntityManager();
        $user = $em->getRepository('User')->findOneBy(array('email' => $email));

        if (!($user instanceof User)) {
            throw new \core\exception\LoginIncorrect('E-mail e/ou senha incorreto.');
        }
        if (!userRule::isValidPassword($password, $user->getPassword(), $user->getSalt())) {
            throw new \core\exception\LoginIncorrect('E-mail e/ou senha incorreto.');
        }
        if (!$user->getActive()) {
            throw new \core\exception\LoginIncorrect('Usuário encontra-se inativo.');
        }

        $tokenExpirationDate = new DateTime();
        $tokenExpirationDate->add(New DateInterval('PT' . configuration::getConfig('default_ttl@token') . 'S'));

        $token = new Token;
        $token->setCreationDate(new DateTime());
        $token->setUser($user);
        $token->setTokenKey(md5(uniqid('token_' . $user->getId() . '_', true)));
        $token->setExpirationDate($tokenExpirationDate);

        $em->persist($token);
        $em->flush();

        return $token;
    }

}
