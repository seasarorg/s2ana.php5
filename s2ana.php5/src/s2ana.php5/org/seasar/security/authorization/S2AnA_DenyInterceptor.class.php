<?php

/**
 * @author yonekawa
 */
class S2AnA_DenyInterceptor extends S2AnA_AbstractAuthorizationInterceptor
{
    public function __construct($roleName)
    {
        $this->addRoleName($roleName);
    }
    
    protected function ifInRole(S2Container_MethodInvocation $invocation,
                                S2AnA_AuthenticationContext $context,
                                $roleName) 
    {
        throw new S2AnA_AccessDeniedException($invocation->getThis(), $context, $roleName);
    }
    protected function ifNotInRole(S2Container_MethodInvocation $invocation,
                                   S2AnA_AuthenticationContext $context )
    {
        return $invocation->proceed();
    }
}

?>