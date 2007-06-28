<?php
interface LoginDao {
    const BEAN = "S2AnA_LoginUser";
    
    public function getUser($id, $password);
    //public function findAllArray();
    //public function update(LoginEntity $entity);
    //public function insert(LoginEntity $entity);
    //public function delete(LoginEntity $entity);
}
?>
