<?php

class S2AnA_CsrfInterceptor extends S2Container_AbstractInterceptor
{
    private $securityToken;

    public function setSecurityToken(S2AnA_SecurityToken $securityToken)
    {
        $this->securityToken = $securityToken;
    }

    public function invoke(S2Container_MethodInvocation $invocation)
    {
        if (S2AnA_RequestUtility::isPost() && $this->securityToken->validateSecurityToken()) {
            return $invocation->proceed();
        } else {
            throw new S2AnA_CsrfAttackException($invocation->getThis(),
                                                $this->securityToken->getTokenName());
        }
    }
}

/**
 * security_token tag
 * <input type="hidden" name=$tokenParamName value={getSecurityToken} />
 * token is MD5 hash for session_id
 */

class S2AnA_SecurityToken
{
    private $tokenName = 'security_token';

    public function getSecurityToken()
    {
        $session_id = S2AnA_SessionUtility::getSessionId();
        if ($session_id === FALSE) {
            return FALSE;
        }
        $token = md5($session_id);
        return $token;
    }
    public function validateSecurityToken()
    {
        if (array_key_exists($this->tokenName, $_POST)
            || strlen( $_POST[$this->tokenName] ) <= 0)
        {
            return FALSE;
        }
        $postToken = $_POST[$this->tokenName];

        $security_token = $this->getSecurityToken();
        if ($security_token === FALSE) {
            return FALSE;
        }

        // validate
        if (strcasecmp($postToken, $security_token) !== 0) {
            return FALSE
        }
        return TRUE;
    }

    public function setTokenName($tokenName)
    {
        $this->tokenName = $tokenName;
    }
    public function getTokenName()
    {
        return $this->tokenName;
    }
}

class S2AnA_RequestUtility
{
    const GET =  'GET';
    const POST = 'POST';

    public static function isPost()
    {
        if (array_key_exists( 'REQUEST_METHOD', $_SERVER ) 
            || $_SERVER['REQUEST_METHOD'] !== self::POST )
        {
            return FALSE;
        }
        return TRUE;
    }

    public static function isGet()
    {
        if (array_key_exists( 'REQUEST_METHOD', $_SERVER )
            || $_SERVER['REQUEST_METHOD'] !== self::GET )
        {
            return FALSE;
        }
        return TRUE;
    }
}

?>