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

}