<?php
class LoginServiceImpl 
    implements LoginService {

    private $loginDao;
    private $warnings;

    public function __construct(){
        $this->warnings = array();
    }
    
    public function login($login_id = NULL, $password = NULL)
    {
        if (is_null($login_id))
            $this->addWarnings('Parameter login is required');
        if (is_null($password))
            $this->addWarnings('Parameter password is required');
        
        if (count($this->messages) > 0)
            return FALSE;
        
        $encrypted_password = S2AnA_PasswordUtility::encrypt($password, $this->salt);
        
        $login_user = $this->loginDao->getUser($login_id, $encrypted_password);
        if (is_null($login_user)) {
            $this->addWarnings('Your login was incorrect');
            return FALSE;
        }
        
        S2AnA_SessionUtility::set($login_user);
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
    
    public function setSalt($salt)
    {
        // Should check length limit?
        $this->salt = $salt;
    }
}
?>
