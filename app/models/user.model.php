<?php

class UserModel {
    private $db;

    public function __construct() {
        error_reporting(0);
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_orders;charset=utf8', 'root', '');        
    }

public function getUserByEmail($email){
    $query = $this->db->prepare("SELECT * FROM user WHERE email = ?");
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    
}


}