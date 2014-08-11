<?php

namespace core;

/**
 * Description of abstractController
 *
 * @author Provisorio
 */
class abstractController
{

    public function getApp()
    {
        return \Slim\Slim::getInstance();
    }

    public function setResponse($status, $message, $data)
    {

        $this->getApp()->response->body(json_encode(
                        array(
                            'status' => $status,
                            'message' => $message,
                            'data' => $data
                        )
        ));
    }

}
