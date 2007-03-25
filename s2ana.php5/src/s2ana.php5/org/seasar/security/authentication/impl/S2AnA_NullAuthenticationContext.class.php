<?php

/**
 * @author yonekawa
 */
class S2AnA_NullAuthenticationContext implements S2AnA_AuthenticationContext
{
    public function getUserPrincipal()
    {
        return new S2AnA_UserPrincipal('unauthenticated user');
    }
    public function isAuthenticated()
    {
        return FALSE;
    }
    public function isUserInRole($roleName)
    {
        return FALSE;
    }
}

?>