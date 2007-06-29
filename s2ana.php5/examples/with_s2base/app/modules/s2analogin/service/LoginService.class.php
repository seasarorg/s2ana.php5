<?php
interface LoginService {
    public function signup();
    public function login($login_id = NULL, $password = NULL);
    public function getWarnings();
}
?>
