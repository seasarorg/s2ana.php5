<?php

class UseGlobalVariableContext implements S2AnA_AuthenticationContext
{
    public function getUserPrincipal()
    {
        global $userPrincipal;
        return $userPrincipal;
    }
    
    public function isAuthenticated()
    {
        global $authenticated;
        return $authenticated;
    }
    
    public function isUserInRole($roleName)
    {
        global $inRoles;
        return in_array($roleName, $inRoles);
    }
}

?>