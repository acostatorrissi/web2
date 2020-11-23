<?php

require_once('libs/smarty/Smarty.class.php');

class UsserView{

    private $title;

    function showFormLogIn($error = null){
        $smarty = new Smarty();
        $smarty->assign('error', $error);
        $smarty->assign('titulo', $this->title = "Log In"); //este title lo pasamos pero no lo usamos
        $smarty->display('templates/login_form.tpl');
    }

    function showUssers($ussers){
        $smarty = new Smarty();
        $smarty->assign('titulo', $this->title = "Usuarios registrados");
        $smarty->assign('ussers', $ussers);
        $smarty->display('templates/show_ussers.tpl');
    }

    function showRegisterPage($error = null){
        $smarty = new Smarty();
        $smarty->assign('error', $error);
        $smarty->display('templates/register_form.tpl');
    }

}