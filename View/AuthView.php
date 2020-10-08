<?php

require_once('libs/smarty/Smarty.class.php');

class AuthView{

    private $title;

    function showFormLogIn(){
        $smarty = new Smarty();
        $smarty->assign('titulo', $this->title = "Log In");
        $smarty->display('templates/login_form.tpl');
    }

}