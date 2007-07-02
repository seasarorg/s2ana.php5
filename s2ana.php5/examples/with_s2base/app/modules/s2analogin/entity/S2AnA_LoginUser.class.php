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

    protected $email;
    const email_COLUMN = "email";
    public function setEmail($val){$this->email = $val;}
    public function getEmail(){return $this->email;}

    protected $firstname;
    const firstname_COLUMN = "firstname";
    public function setFirstName($val){$this->firstname = $val;}
    public function getFirstName(){return $this->firstname;}

    protected $lastname;
    const lastname_COLUMN = "lastname";
    public function setLastName($val){$this->lastname = $val;}
    public function getLastName(){return $this->lastname;}

    protected $salted_password;
    const salted_password_COLUMN = "salted_password";
    public function setSalted_password($val){$this->salated_password = $val;}
    public function getSalted_password(){return $this->salted_password;}

    protected $salt;
    const salt_COLUMN = "salt";
    public function setSalt($val){$this->salt = $val;}
    public function getSalt(){return $this->salt;}

    protected $verified;
    const verified_COLUMN = "verified";
    public function setVerified($val){$this->verified = $val;}
    public function getVerified(){return $this->verified;}

    protected $deleted;
    const deleted_COLUMN = "deleted";
    public function setDeleted($val){$this->deleted = $val;}
    public function getDeleted(){return $this->deleted;}

    public function __toString() {
        $buf = array();
        $buf[] = 'id => ' . $this->getId();
        $buf[] = 'login => ' . $this->getLogin();
        $buf[] = 'email => ' . $this->getEmail();
        $buf[] = 'firstname => ' . $this->getFirstName();
        $buf[] = 'lastname => ' . $this->getLastName();
        $buf[] = 'salted_password => ' . $this->getSalated_Password();
        $buf[] = 'salt => ' . $this->getSalt();
        $buf[] = 'verified => ' . $this->getVerified();
        $buf[] = 'deleted => ' . $this->getDeleted();
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
