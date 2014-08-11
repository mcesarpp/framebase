<?php

use core\abstractController;

class testeController extends abstractController
{

    public function testeAAction()
    {
        $this->setResponse(true, 'Sucesso', array(
            'teste' => 'A'
        ));
    }

    public function testeBAction()
    {
        $this->setResponse(true, 'Sucesso', array(
            'teste' => 'B'
        ));
    }

}
