<?php

use core\abstractController;
use core\database\doctrine;

class testeController extends abstractController
{

    public function testeAAction()
    {
        $em = doctrine::getEntityManager();
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
