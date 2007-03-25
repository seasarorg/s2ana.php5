<?php

/**
 * @author yonekawa
 */
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

?>