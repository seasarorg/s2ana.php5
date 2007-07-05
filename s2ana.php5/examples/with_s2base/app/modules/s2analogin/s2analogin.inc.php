<?php
$modDir = dirname(__FILE__);
S2ContainerClassLoader::import($modDir . '/action');
S2ContainerClassLoader::import($modDir . '/interceptor');
S2ContainerClassLoader::import($modDir . '/service');
?>
