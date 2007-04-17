<?php

/**
 * @author yonekawa
 */
class S2AnA_AccessDeniedException extends S2Container_S2RuntimeException
{
    private $targetComponent;
    private $authContext;
    private $roleName;
    
    public function __construct($targetComponent, $authContext, $roleName = NULL)
    {
        parent::__construct('EANA0001', array(get_class($targetComponent)));
        $this->targetComponent = $targetComponent;
        $this->authContext = $authContext;
        $this->roleName = $roleName;
    }
    
    public function getTargetComponent()
    {
        return $this->targetComponent;
    }
    
    public function getDeniedAuthenticationContext()
    {
        return $this->authContext;
    }
    
    public function getDeniedRoleName()
    {
        return $this->roleName;
    }
}

?>