<?php
class LoginServiceImpl 
    implements LoginService
{

    private $userDao;
    private $warnings;

    public function __construct(){
        $this->warnings = array();
    }

    public function login($login = NULL, $password = NULL)
    {
        if (is_null($login))
            $this->addWarnings('Parameter login is required');
        if (is_null($password))
            $this->addWarnings('Parameter password is required');
        
        if (count($this->messages) > 0)
            return FALSE;
        
        $verified = TRUE;
        $deleted = FALSE;
        $user = $this->userDao->getUser($login, $verified, $deleted);
        if (is_null($user)) {
            $this->addWarnings('Your login was incorrect');
            return FALSE;
        }
        
        // salt is user column.
        $salt = $user->getSalt();
        $hashed_password = S2AnA_EncryptionUtility::hashed($password);
        $salted_password = S2AnA_EncryptionUtility::salted($hashed_password, $salt);
        
        $login_user = $this->userDao->getAuthenticatedUser($login, $salted_password);
        if (is_null($login_user)) {
            $this->addWarnings('Your login was incorrect');
            return FALSE;
        }

        S2AnA_SessionManager::set(S2ANA_PHP5_SESSION_USER, $login_user);
        return TRUE;
    }

    public function setUserDao(S2AnA_UserDao $dao){
        $this->userDao = $dao;
    }

    public function getWarnings()
    {
        return $this->warnings;
    }
    
    public function addWarnings($warning_mesage)
    {
        $this->warnings[] = $warning_mesage;
    }

}
?>
