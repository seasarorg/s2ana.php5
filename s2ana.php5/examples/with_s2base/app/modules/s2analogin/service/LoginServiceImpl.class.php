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
        if( ! $this->validateParam($login, $password) )
            return FALSE;

        $verified = 1;
        $deleted = 0;
        $user = $this->userDao->getVerifiedUser($login, $verified, $deleted);
        if (is_null($user)) {
            $this->addWarnings('Your login was incorrect');
            return FALSE;
        }

        $user_salt = $user->getSalt();
        $hashed_password = hash_hmac('sha1', $password, $user_salt);

        $login_user = $this->userDao->getAuthenticatedUser($login, $hashed_password);
        if (is_null($login_user)) {
            $this->addWarnings('Your login was incorrect');
            return FALSE;
        }

        S2AnA_SessionManager::set(S2ANA_PHP5_SESSION_USER, $login_user);
        return TRUE;
    }

    // temp
    public function addUser()
    {
        $user = new S2AnA_User();
        $user->setEmail('yonekawa@seasar.org');
        $user->setLogin('yonekawa');

        $user->setFirstname('健一');
        $user->setLastname('米川');

        $salt = sha1('salt' . time());
        $user->setSalt($salt);
        $hashed_password = hash_hmac('sha1', $password, $salt);
        $user->setHashed_password($hashed_password);
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

    private validateParam($login = NULL, $password = NULL)
    {
        if (is_null($login))
            $this->addWarnings('Parameter login is required');
        if (is_null($password))
            $this->addWarnings('Parameter password is required');

        if (count($this->warnings) > 0)
            return FALSE;

        return TRUE;
    }

}
?>
