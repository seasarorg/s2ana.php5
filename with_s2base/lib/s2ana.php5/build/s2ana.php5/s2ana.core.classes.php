<?php
interface S2AnA_AuthenticationContext
{
    public function getUserPrincipal();
    public function isAuthenticated();
    public function isUserInRole($roleName);
}

interface S2AnA_AuthenticationContextResolver
{
    public function resolve();
}

class S2AnA_AuthenticationContextResolverImpl implements S2AnA_AuthenticationContextResolver
{
    private $container;
    public function setContainer(S2Container $container) {
        $this->container = $container;
    }
    public function resolve() {
        return $this->container->getComponent('authenticationContext');
    }
}

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
