<?php
class S2AnA_LoginUser {
    const TABLE = "s2ana_user";
    public function __construct(){}

    protected $id;
    const id_COLUMN = "id";
    public function setId($val){$this->id = $val;}
    public function getId(){return $this->id;}
    
    protected $login;
    const login_COLUMN = "login";
    public function setLogin($val){$this->login = $val;}
    public function getLogin(){return $this->login;}

    protected $salted_password;
    const salted_password_COLUMN = "salted_password";
    public function setSalted_password($val){$this->salated_password = $val;}
    public function getSalted_password(){return $this->salted_password;}

    public function __toString() {
        $buf = array();
        $buf[] = 'id => ' . $this->getId();
        $buf[] = 'login => ' . $this->getLogin();
        $buf[] = 'salted_password => ' . $this->getSalated_Password();
        return '{' . implode(', ',$buf) . '}';
    }

    /*
    private $prop;
    const prop_RELNO = 0;
    const prop_RELKEYS = 'this_fk:other_pk';
    public function setProp(OtherEntity $entity){ $this->prop = $entity; }
    public function getProp(){ return $this->prop; }
    */    
}
?>
