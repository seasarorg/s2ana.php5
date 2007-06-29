<?php
error_reporting(E_ALL & ~E_NOTICE | E_STRICT);

define('S2ANA_PHP5_HOME_DIR', dirname(dirname(__FILE__)));
define('S2ANA_PHP5_TEST_DIR', S2ANA_PHP5_HOME_DIR . '/test');
define('S2ANA_PHP5_TEST_PACKAGE_DIR', S2ANA_PHP5_TEST_DIR . '/s2ana.php5/org/seasar');

define('APP_DICON', S2ANA_PHP5_TEST_DIR . '/resource/app.dicon');

require_once 'S2Container/S2Container.php';
require_once S2ANA_PHP5_HOME_DIR . '/build/s2ana.php5/S2AnA.php';

S2ContainerClassLoader::import(S2CONTAINER_PHP5);
S2ContainerClassLoader::import(S2ANA_PHP5);
S2ContainerClassLoader::import(S2ANA_PHP5_TEST_DIR . '/classes');

function __autoload($class = null)
{
    S2ContainerClassLoader::load($class);
}

?>
