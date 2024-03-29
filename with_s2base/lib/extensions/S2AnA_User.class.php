<?php
class S2AnA_User
{
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

    protected $hashed_password;
    const hashed_password_COLUMN = "hashed_password";
    public function setHashed_password($val){$this->hashed_password = $val;}
    public function getHashed_password(){return $this->hashed_password;}

    protected $salt;
    const salt_COLUMN = "salt";
    public function setSalt($val){$this->salt = $val;}
    public function getSalt(){return $this->salt;}
    
    protected $role;
    const role_COLUMN = "role";
    public function setRole($val){$this->role = $val;}
    public function getRole(){return $this->role;}

    protected $verified;
    const verified_COLUMN = "verified";
    public function setVerified($val){$this->verified = $val;}
    public function getVerified(){return $this->verified;}

    protected $deleted;
    const deleted_COLUMN = "deleted";
    public function setDeleted($val){$this->deleted = $val;}
    public function getDeleted(){return $this->deleted;}
    
    protected $logged_in_at;
    const logged_in_at_COLUMN = "logged_in_at";
    public function setLogged_in_at($val){$this->logged_in_at = $val;}
    public function getLogged_in_at(){return $this->logged_in_at;}
    
    protected $created_at;
    const created_at_COLUMN = "created_at";
    public function setCreated_at($val){$this->created_at = $val;}
    public function getCreated_at(){return $this->created_at;}
    
    protected $updated_at;
    const updated_at_COLUMN = "updated_at";
    public function setUpdated_at($val){$this->updated_at = $val;}
    public function getUpdated_at(){return $this->updated_at;}
    
    protected $deleted_after;
    const deleted_after_COLUMN = "deleted_after";
    public function setDeleted_after($val){$this->deleted_after = $val;}
    public function getDeleted_after(){return $this->deleted_after;}

    public function __toString() {
        $buf = array();
        $buf[] = 'id => ' . $this->getId();
        $buf[] = 'login => ' . $this->getLogin();
        $buf[] = 'email => ' . $this->getEmail();
        $buf[] = 'firstname => ' . $this->getFirstName();
        $buf[] = 'lastname => ' . $this->getLastName();
        $buf[] = 'hashed_password => ' . $this->getHashed_Password();
        $buf[] = 'salt => ' . $this->getSalt();
        $buf[] = 'Role => ' . $this->getRole();
        $buf[] = 'verified => ' . $this->getVerified();
        $buf[] = 'deleted => ' . $this->getDeleted();
        $buf[] = 'created_at => ' . $this->getDeleted_after();
        $buf[] = 'updated_at => ' . $this->getUpdated_at();
        $buf[] = 'deleted_after => ' . $this->getDeleted_after();
        return '{' . implode(', ',$buf) . '}';
    }
}
?>
