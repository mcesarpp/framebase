<?php

namespace core\security;

use core\exception\NotImplementedException;
use core\exception\ResourceNotAllowedException;
use core\exception\ResourceNotFoundException;

/**
 * Description of AcessSecurity
 *
 * @author Provisorio
 */
class AccessSecurity
{

    public function checkTokenAuthorization($resourceId, $tokenId = null)
    {
        $resourceId = strtolower($resourceId);

        if (!$resource = $this->getResource($resourceId)) {
            throw new ResourceNotFoundException("Recurso solicitado não encontrado ($resourceId).");
        }

        if ($resource['authenticationRequired']) {
            if (!$tokenResources = $this->getTokenResources($tokenId)) {
                throw new ResourceNotAllowedException('Realize login para acessar o recurso solicitado.');
            }

            if ($resource['authorizationRequired'] && !in_array($resourceId, $tokenResources)) {
                throw new ResourceNotAllowedException('Usuário não possui autorização para acessar o recurso solicitado.');
            }
        }

        return true;
    }

    public function getResource($resourceId)
    {
        $resources = array(
            'token::get' => array(
                'authenticationRequired' => false,
                'authorizationRequired' => false
            ),
            'teste::testea' => array(
                'authenticationRequired' => true,
                'authorizationRequired' => true
            ),
            'teste::testeb' => array(
                'authenticationRequired' => true,
                'authorizationRequired' => true
            )
        );

        if (isset($resources[$resourceId])) {
            return $resources[$resourceId];
        } else {
            return false;
        }
    }

    public function getTokenResources($tokenId)
    {
        $allowedTokenResources = array(
            'chave_token_123' => array(
                'teste::testea'
            )
        );

        if (isset($allowedTokenResources[$tokenId])) {
            return $allowedTokenResources[$tokenId];
        } else {
            return false;
        }
    }

}
