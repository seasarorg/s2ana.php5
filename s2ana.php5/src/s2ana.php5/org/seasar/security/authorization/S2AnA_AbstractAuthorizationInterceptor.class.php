<?php

/**
 * @author yonekawa
 */
abstract class S2AnA_AbstractAuthorizationInterceptor extends S2Container_AbstractInterceptor
{
    private $roleNames = array();
    private $contextResolver = NULL;

    abstract protected function ifInRole(S2Container_MethodInvocation $invocation,
                                      S2AnA_AuthenticationContext $context,
                                      $roleName);
    abstract protected function ifNotInRole(S2Container_MethodInvocation $invocation,
                                         S2AnA_AuthenticationContext $context );

    public function setContextResolver(S2AnA_AuthenticationContextResolver $resolver)
    {
        $this->contextResolver = $resolver;
    }

    public function invoke(S2Container_MethodInvocation $invocation)
    {
        $authenticationContext = $this->contextResolver->resolve();
        $roleNamesCount = count( $this->roleNames );
        for ( $i = 0; $i < $roleNamesCount; $i++ ) {
            $roleName = $this->roleNames[$i];
            if ($authenticationContext->isUserInRole($roleName)) {
                return $this->ifInRole($invocation, $authenticationContext, $roleName);
            }
        }
        return $this->ifNotInRole($invocation, $authenticationContext);
    }

    public function addRoleName($roleName)
    {
        if (is_null($roleName) && strlen($roleName) === 0) return;

        if ( ! in_array($roleName, $this->roleNames)) {
            $this->roleNames[] = $roleName;
        }
    }
}
?>