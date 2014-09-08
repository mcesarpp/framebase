<?php

use core\abstractController;
use core\database\doctrine;
use core\configuration\configuration;

class tokenController extends abstractController
{

    public function getAction($params)
    {

        $tokenRule = new tokenRule;

        $token = $tokenRule->getUserToken('m.cesarpp@gmail.com', 'teste');


        $this->setResponse(true, 'Token criado com sucesso', array(
            'token' => $token->getTokenKey()
        ));
    }

}
