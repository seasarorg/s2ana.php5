<?php

/**
 * @author yonekawa
 */
class S2AnA_NotAuthenticatedException extends S2Container_S2RuntimeException
{
    private $targetComponent;
    private $authContext;

    public function __construct($targetComponent, $authContext)
    {
        parent::__construct('EANA0003', array(get_class($targetComponent)));
        $this->targetComponent = $targetComponent;
        $this->authContext = $authContext;
    }
    
    public function getTargetComponent()
    {
        return $this->targetComponent;
    }
    
    public function getDeniedAuthenticationContext()
    {
        return $this->authContext;
    }
    
}

?>