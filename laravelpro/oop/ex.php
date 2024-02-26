<?php
class user{
    private $username;
    private $password;
    private $db_username='thangvan';
    private $db_password='thangdai03';
    

    public function setInfo($username,$password){
        $this->password=$password;
        $this->username=$username;

    }
    public function check(){
        if($this->username==$this->db_username  & $this->password==$this->db_password){
            echo "xin chao".$this->username;
        }else{
            echo "user ko ton tai tren he thong";
        }
    }
}
$a=new user;
$a->setInfo("thangvan","thangdai03");
$a->check();
?>