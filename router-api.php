<?php

    require_once 'RouterClass.php';
    require_once 'api/ComentController.php'


    $r = new Router();

    $r->addRoute("comentarios", "GET", "ComentController", "getAll");
    $r->addRoute("comentarios/:ID", "GET", "ComentController", "getComent");
    $r->addRoute("comentarios/:ID", "DELETE", "ComentController", "delete");
    $r->addRoute("comentarios", "POST", "ComentController", "add");
    $r->addRoute("comentarios/:ID", "PUT", "ComentController", "update");

    $r->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);