<?php

use core\abstractController;

/**
 * Description of frontController
 *
 * @author Provisorio
 */
class frontController extends abstractController
{

    public function resolveRequest($controller, $action, $params)
    {
        try {
            $controllerClassName = ($controller == null ? 'indexController' : $controller . 'Controller');
            $actionMethodName = ($action == null ? 'indexAction' : $action . 'Action');

            if (!class_exists($controllerClassName)) {
                throw new NotImplementedException("Contexto inexistente ($controller)");
            }

            $controllerObject = new $controllerClassName;

            if (!method_exists($controllerObject, $actionMethodName)) {
                throw new NotImplementedException("Operação inexistente ($action)");
            }

            $accessSecurityService = new AccessSecurity();
            $accessSecurityService->checkTokenAuthorization($controller . '::' . $action, $this->getApp()->request->headers('token'));

            $controllerObject->$actionMethodName($params);
        } catch (Exception $ex) {

            if ($ex instanceof ResourceNotAllowedException) {
                $this->getApp()->response->setStatus(401);
            } elseif ($ex instanceof NotImplementedException) {
                $this->getApp()->response->setStatus(501);
            } else {
                $this->getApp()->response->setStatus(400);
            }

            $this->setResponse(false, $ex->getMessage(), null);
        }
    }

}
