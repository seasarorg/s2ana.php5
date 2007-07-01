<?php
class LoginDaoTest extends PHPUnit2_Framework_TestCase {
    private $module = "s2analogin";
    private $container;
    private $dao;
    
    function __construct($name) {
        parent::__construct($name);
    }

    function testGetUser() {
    }
    
    function testGetLoginUser() {
    }

    function setUp(){
        print __CLASS__ . "::{$this->getName()}\n";
        $moduleDir = S2BASE_PHP5_ROOT . "/app/modules/{$this->module}";
        $dicon = $moduleDir . "/dicon/LoginServiceImpl" . S2BASE_PHP5_DICON_SUFFIX;
        include_once($moduleDir . "/{$this->module}.inc.php");
        $this->container = S2ContainerFactory::create($dicon);
        $this->dao = $this->container->getComponent("LoginDao");
    }

    function tearDown() {
        print "\n";
        $this->container = null;
        $this->dao = null;
    }

}
?>
