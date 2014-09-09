<?php

namespace core\security;

/**
 * Description of AcessSecurityResource
 *
 * @author Provisorio
 */
class AccessSecurityResource
{

    protected $resourceId;

    public function __construct($resourceId)
    {
        $this->resourceId = $resourceId;
    }

}
