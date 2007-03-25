<?php

/**
 * @author yonekawa
 */
class S2AnA_AuthenticatedAccessOnlyInterceptor extends S2Container_AbstractInterceptor
{
    private $contextResolver;
    public function setAuthenticationContextResolver(S2AnA_AuthenticationContextResolver $resolver) {
        $this->contextResolver = $resolver;
    }

    public function invoke(S2Container_MethodInvocation $invocation)
    {
        $authContext = $this->contextResolver->resolve();
        if ($authContext->isAuthenticated()) {
            return $invocation->proceed();
        } else {
            throw new S2AnA_NotAuthenticatedException($invocation->getThis(), $authContext);
        }
    }
}

?>