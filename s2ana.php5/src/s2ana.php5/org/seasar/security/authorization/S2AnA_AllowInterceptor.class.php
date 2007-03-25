<?php

class S2AnA_AllowInterceptor extends S2AnA_AbstractAuthorizationInterceptor
{
    public function __construct($roleName)
    {
        $this->addRoleName($roleName);
    }
    
    protected function ifInRole(S2Container_MethodInvocation $invocation,
                                S2AnA_AuthenticationContext $context,
                                $roleName)
    {
        return $invocation->proceed();
    }
    protected function ifNotInRole(S2Container_MethodInvocation $invocation,
                                   S2AnA_AuthenticationContext $context)
    {
        throw new S2AnA_AccessDeniedException($invocation->getThis(), $context);
    }
}

?>