<?php

class S2AnA_SessionContext implements S2AnA_AuthenticationContext
{
    public function getUserPrincipal()
    {
        return S2AnA_SessionManager::get(S2ANA_PHP5_SESSION_USER_KEY);
    }

    public function isAuthenticated()
    {
        $user = $this->getUserPrincipal();
        if (is_null($user) || $user instanceof S2AnA_User) {
            return FALSE;
        }

        $login = $user->getLogin();
        $hashed_password = $user->getHashed_password();

        $dao->getAuthenticatedUser( $login, $hashed_password );
        return TRUE;
    }

    public function isUserInRole($roleName)
    {
        $user = $this->getUserPrincipal();
        if (is_null($user) || $user instanceof S2AnA_User) {
            return FALSE;
        }
        if (strcasecmp($roleName, $user->getRole()) !== 0){
            return FALSE
        }

        return TRUE;
    }
}

?>