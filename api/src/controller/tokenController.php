<?php

use core\abstractController;

class tokenController extends abstractController
{

    public function getAction()
    {
        $this->setResponse(true, 'Token criado com sucesso', array(
            'token' => 'chave_token_123',
            'user' => array(
                'id' => 1,
                'nickname' => 'Murilo Cesar',
                'email' => 'm.cesarpp@gmail.com',
            )
        ));
    }

}
