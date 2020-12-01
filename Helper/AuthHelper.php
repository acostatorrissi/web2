<?php

class AuthHelper{

    public function checkLog(){
        $this->startSession();
        if(!isset($_SESSION['USSER_ID']) || !isset($_SESSION['USSER_EMAIL']) 
            && (isset($_SESSION['LAST_ACTIVITY']))){
            header("Location: ".BASE_URL."logout"); 
            die();
        }
    }

    public function startSession(){
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
    }

    public function adminCheckLog(){

        $this->startSession();
        $this->checkLog();

         if($_SESSION['USSER_ROLE'] == 0){
             header("Location: ".BASE_URL."logout"); 
             die();
        }
    }
    
    public function logOut(){
        $this->startSession();
        session_destroy();
        header("Location: ".BASE_URL."login");
        die();
    }

    public function sessionData($usser){
        $this->startSession();
        $_SESSION['USSER_ID'] = $usser->id;
        $_SESSION['USSER_EMAIL'] = $usser->email;
        $_SESSION['USSER_ROLE'] = $usser->rol; // ver esto
    }

    function isLoggedIn(){
        if(isset($_SESSION['USSER_ID'])){
            return $_SESSION;
        }else{
            return false;
        }
    }

}