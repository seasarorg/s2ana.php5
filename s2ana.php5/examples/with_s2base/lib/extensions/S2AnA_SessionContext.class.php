<?php

class S2AnA_SessionContext implements S2AnA_AuthenticationContext
{
    private $userDao;
    
    public function __construct()
    {
        $container = S2ContainerFactory::create(S2ANA_PHP5_USER_DICON);
        $this->userDao = $container->getComponent('S2AnA_UserDao');
    }
    
    public function getUserPrincipal()
    {
        return S2AnA_SessionUtility::get(S2ANA_PHP5_SESSION_USER);
    }

    public function isAuthenticated()
    {
        $user = $this->getUserPrincipal();
        if ( ! $user || $user instanceof S2AnA_User) {
            return FALSE;
        }

        $login = $user->getLogin();
        $hashed_password = $user->getHashed_password();

        
        $authenticated_user = $userDao->getAuthenticatedUser( $login, $hashed_password );
        if (is_null($authenticated_user)) {
            return FALSE;
        }
        return TRUE;
    }

    public function isUserInRole($roleName)
    {
        $user = $this->getUserPrincipal();
        if (is_null($user) || $user instanceof S2AnA_User) {
            return FALSE;
        }
        if (strcasecmp($roleName, $user->getRole()) !== 0){
            return FALSE;
        }

        return TRUE;
    }
}

?>