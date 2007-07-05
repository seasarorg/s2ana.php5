<?php

interface S2AnA_UserDao
{
    const BEAN = "S2AnA_User";
    
    public function getVerifiedUser($login_id, $verified, $deleted);
    public function getAuthenticatedUser($login_id, $password);
    
    public function insert(S2AnA_User $user);
    public function update(S2AnA_User $user);
    public function delete(S2AnA_User $user);
}

?>
