<?php

class UsserModel{

    private $db;
   
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8','root','');
    }

    function getUsser($email){
        $query = $this->db->prepare('SELECT * FROM usser WHERE email=?');
        $query->execute([$email]);
        $usser = $query->fetch(PDO::FETCH_OBJ);
        return $usser;
    }
}