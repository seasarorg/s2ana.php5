<?php

require_once 'environment.php';

$container = S2ContainerFactory::create(REQUIRE_LOGIN_DIR . '/resources/component.dicon');
$authComponent = $container->getComponent('authComponent');

try {
    $authComponent->call();
    echo "authenticated!\n";
} catch (S2AnA_NotAuthenticatedException $ex) {
    echo "not authenticated!\n";
}
?>