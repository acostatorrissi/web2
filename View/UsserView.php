<?php

require_once('libs/smarty/Smarty.class.php');

class UsserView{

    private $title;

    function showFormLogIn($error = null){
        $smarty = new Smarty();
        $smarty->assign('error', $error);
        $smarty->assign('titulo', $this->title = "Log In");
        $smarty->display('templates/login_form.tpl');
    }

}