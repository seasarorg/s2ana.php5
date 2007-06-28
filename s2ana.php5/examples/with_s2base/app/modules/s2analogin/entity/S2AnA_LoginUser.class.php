<?php
class S2AnA_LoginUser {
    const TABLE = "s2ana_user";
    public function __construct(){}

    protected $id;
    const id_COLUMN = "id";
    public function setId($val){$this->id = $val;}
    public function getId(){return $this->id;}

    protected $name;
    const name_COLUMN = "name";
    public function setName($val){$this->name = $val;}
    public function getName(){return $this->name;}

    protected $password;
    const password_COLUMN = "password";
    public function setPassword($val){$this->password = $val;}
    public function getPassword(){return $this->password;}


    public function __toString() {
        $buf = array();
        $buf[] = 'id => ' . $this->getId();
        $buf[] = 'name => ' . $this->getName();
        $buf[] = 'password => ' . $this->getPassword();
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
