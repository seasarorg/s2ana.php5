<?php

require_once 'S2Container/S2Container.php';
//require_once 'S2AnA/S2AnA.php';
require_once dirname(dirname(dirname(__FILE__))) . '/build/s2ana.php5/S2AnA.php';

define('REQUIRE_LOGIN_DIR', dirname(__FILE__));

S2ContainerClassLoader::import(S2CONTAINER_PHP5);
S2ContainerClassLoader::import(S2ANA_PHP5);
S2ContainerClassLoader::import(dirname(__FILE__) . '/classes');

function __autoload($class = null)
{
    S2ContainerClassLoader::load($class);
}

?>