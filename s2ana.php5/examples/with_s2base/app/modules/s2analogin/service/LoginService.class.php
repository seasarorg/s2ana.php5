<?php

interface LoginService
{
    // public function signup(S2AnA_User $user);
    // public function notify_password($login, $email);
    public function login($login = NULL, $password = NULL);
    public function getWarnings();
}

?>
