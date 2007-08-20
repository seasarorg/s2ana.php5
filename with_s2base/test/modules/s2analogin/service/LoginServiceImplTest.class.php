<?php
class LoginServiceImplTest extends PHPUnit2_Framework_TestCase {
    private $module = "s2analogin";
    private $container;
    private $service;
    
    function __construct($name)
    {
        parent::__construct($name);
    }

    function testLoginSuccess()
    {
        $login_id = 'yonekawa';
        $password = 'password';
        
        $success = $this->service->login($login_id, $password);
        $this->assertEquals($success, TRUE);
    }
    
    function testLoginNullLoginId()
    {
        $login_id = NULL;
        $password = 'hoge';
        
        $success = $this->service->login($login_id, $password);
        $this->assertEquals($success, FALSE);
        
        $warnings = $this->service->getWarnings();
        $should_warnings = array( 'Parameter login is required' );
        $this->assertEquals($warnings, $should_warnings);
    }
    
    function testLoginNullPassword()
    {
        $login_id = 'hoge';
        $password = NULL;
        
        $success = $this->service->login($login_id, $password);
        $this->assertEquals($success, FALSE);
        
        $warnings = $this->service->getWarnings();
        $should_warnings = array( 'Parameter password is required' );
        $this->assertEquals($warnings, $should_warnings);
    }
    
    function testLoginNotRegisterd()
    {
        $login_id = 'not_registered';
        $password = 'not_registered';
        
        $success = $this->service->login($login_id, $password);
        $this->assertEquals($success, FALSE);
        
        $warnings = $this->service->getWarnings();
        $should_warnings = array( 'Your login was incorrect' );
        $this->assertEquals($warnings, $should_warnings);
    }

    function setUp()
    {
        print __CLASS__ . "::{$this->getName()}\n";
        $moduleDir = S2BASE_PHP5_ROOT . "/app/modules/{$this->module}";
        $dicon = $moduleDir . "/dicon/LoginServiceImpl" . S2BASE_PHP5_DICON_SUFFIX;
        include_once($moduleDir . "/{$this->module}.inc.php");
        $this->container = S2ContainerFactory::create($dicon);
        $this->service = $this->container->getComponent("LoginService");
        
    }

    function tearDown()
    {
        print "\n";
        $this->container = null;
        $this->service = null;
    }

}
?>
