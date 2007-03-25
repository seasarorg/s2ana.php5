<?php
/**
 * @author yonekawa
 */
interface S2AnA_AuthenticationContext
{
    public function getUserPrincipal();
    public function isAuthenticated();
    public function isUserInRole($roleName);
}

?>