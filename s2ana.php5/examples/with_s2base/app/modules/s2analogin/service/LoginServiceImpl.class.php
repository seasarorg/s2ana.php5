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
        
        if (count($this->warnings) > 0)
            return FALSE;
        
        $verified = 1;
        $deleted = 0;
        $user = $this->userDao->getVerifiedUser($login, $verified, $deleted);
        if (is_null($user)) {
            $this->addWarnings('Your login was incorrect');
            return FALSE;
        }
        
        // todo
        $user_salt = $user->getSalt();
        $salted_password = $password
        
        $login_user = $this->userDao->getAuthenticatedUser($login, $salted_password);
        if (is_null($login_user)) {
            $this->addWarnings('Your login was incorrect');
            return FALSE;
        }

        S2AnA_SessionManager::set(S2ANA_PHP5_SESSION_USER, $login_user);
        return TRUE;
    }
    
    public function addUser()
    {
        $user = new S2AnA_User();
        $user->setEmail('yonekawa@seasar.org');
        $user->setLogin('yonekawa');
        
        $user->setFirstname('健一');
        $user->setLastname('米川');
        
        $user->setSalt('salt');
        $user->setSalted_password('password');
        $user->setRole('admin');
        $user->setVerified(TRUE);
        $user->setDeleted(0);
        
        $now = date('Y-m-d H:i:s');
        $user->setCreated_at($now);
        $user->setUpdated_at($now);
        $user->setLogged_in_at($now);
        
        $this->userDao->insert($user);
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
