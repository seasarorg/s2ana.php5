<?php
interface LoginService
{
    const VERIFIED = 1;
    const NOT_VERIFIED = 0;
    const DELETED = 1;
    const NOT_DELETED = 0;
    
    public function login($login = NULL, $password = NULL);
    public function getWarnings();
}
?>
