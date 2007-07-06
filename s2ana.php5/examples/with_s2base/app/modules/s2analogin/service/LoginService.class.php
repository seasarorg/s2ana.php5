<?php

interface LoginService
{
    public function login($login = NULL, $password = NULL);
    public function getWarnings();
}

?>
