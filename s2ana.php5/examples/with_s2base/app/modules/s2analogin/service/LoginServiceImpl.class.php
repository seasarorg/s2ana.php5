<?php
class LoginServiceImpl 
    implements LoginService {

    private $loginDao;
    private $warnings;

    public function __construct(){
        $this->warnings = array();
    }
    
    public function signup() {
        return TRUE;
    }
    
    public function login($login = NULL, $password = NULL)
    {
        if (is_null($login))
            $this->addWarnings('Parameter login is required');
        if (is_null($password))
            $this->addWarnings('Parameter password is required');
        
        if (count($this->messages) > 0)
            return FALSE;
        
        $user = $this->loginDao->getUser($login);
        if (is_null($user)) {
            $this->addWarnings('Your login was incorrect');
            return FALSE;
        }
        
        // salt is user column.
        $salt = $user->getSalt();
        $hashed_password = S2AnA_EncryptionUtility::hashed($password);
        $salted_password = S2AnA_EncryptionUtility::hashed($hashed_password, $salt);
        
        $login_user = $this->loginDao->getLoginUser($login, $salted_password);
        if (is_null($login_user)) {
            $this->addWarnings('Your login was incorrect');
            return FALSE;
        }
        
        S2AnA_SessionManager::set(S2ANA_PHP5_SESSION_USER_KEY, $login_user);
        return TRUE;
    }

    public function setLoginDao(LoginDao $dao){
        $this->loginDao = $dao;
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
