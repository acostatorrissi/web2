<?php
    require_once 'Controller/ProductController.php';
    require_once 'View/ProductView.php';
    require_once 'RouterClass.php';
    

    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    $r->addRoute("home", "GET", "ProductController", "showHome");
    $r->addRoute("company", "GET", "ProductController", "showCompany");
    $r->addRoute("carta", "GET", "ProductController", "showProducts");

    //Esto lo veo en TasksView
    //$r->addRoute("insert", "POST", "ProductController", "InsertTask");
    //$r->addRoute("delete/:ID", "GET", "ProductController", "BorrarLaTaskQueVienePorParametro");
    //$r->addRoute("completar/:ID", "GET", "ProductController", "MarkAsCompletedTask");

    //Ruta por defecto.
    $r->setDefaultRoute("ProductController", "showHome");

    //Advance
    //$r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>