<?php
class LoginDaoTest extends PHPUnit2_Framework_TestCase {
    private $module = "s2analogin";
    private $container;
    private $dao;
    
    private $this->verifiedUser;
    
    function __construct($name) {
        parent::__construct($name);
    }
    
    function testVerifiedUser() {
        
    }
    
    function testGetAuthenticatedUser() {
    }

    function setUp() {
        print __CLASS__ . "::{$this->getName()}\n";
        $moduleDir = S2BASE_PHP5_ROOT . "/app/modules/{$this->module}";
        $dicon = $moduleDir . "/dicon/LoginServiceImpl" . S2BASE_PHP5_DICON_SUFFIX;
        include_once($moduleDir . "/{$this->module}.inc.php");
        $this->container = S2ContainerFactory::create($dicon);
        $this->dao = $this->container->getComponent("LoginDao");
        
        $this->verifiedUser = new S2AnA_User();
        $this->verifiedUser->setEmail('test@seasar.org');
        $this->verifiedUser->setLogin('test');
        
        $salt = 'test';
        $hashed_password = S2AnA_EncryptionUtility::hashed('password', $salt);
        $salted_password = S2AnA_EncryptionUtility::salted($hashed_password, $salted);
        
        $this->verifiedUser->setSalted_password($salted_password);
        $this->verifiedUser->setSalt($salt);
        $this->verifiedUser->setVerified(TRUE);
        $this->verifiedUser->setDeleted(FALSE);
        
        $this->dao->insert($this->verifiedUser);
    }

    function tearDown() {
        $this->dao->delete($this->verifiedUser);

        print "\n";
        $this->container = null;
        $this->dao = null;
    }

}
?>
