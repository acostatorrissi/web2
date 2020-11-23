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

    function getUsers(){
        $query = $this->db->prepare('SELECT * FROM usser');
        $query->execute([]);
        $ussers = $query->fetchAll(PDO::FETCH_OBJ);
        return $ussers;
    }

    function setAdminRole($id){
        $adminRole = 1;
        $query = $this->db->prepare('UPDATE usser SET rol=? WHERE id=?');
        $query->execute([$adminRole, $id]);
    }

    function setBasicRole($id){
        $basicRole = 0;
        $query = $this->db->prepare('UPDATE usser SET rol=? WHERE id=?');
        $query->execute([$basicRole, $id]);
    }

    function deleteUsser($id){
        $query = $this->db->prepare('DELETE FROM usser WHERE id=?');
        $query->execute([$id]);
    }

    function registerNewUsser($name, $lastName, $email, $password){
        $query = $this->db->prepare('INSERT INTO usser (nombre, apellido, email, password) VALUES (?,?,?,?)');
        $query->execute([$name, $lastName, $email, $password]);
    }
}