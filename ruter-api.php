<?php

    require_once 'RouterClass.php';
    require_once 'api/ApiComentController.php'


    $r = new Router();

    $r->addRoute("comentarios", "GET", "ApiComentController", "getAll");
    $r->addRoute("comentarios/:ID", "GET", "ApiComentController", "getComent");
    $r->addRoute("comentarios/:ID", "DELETE", "ApiComentController", "delete");
    $r->addRoute("comentarios", "POST", "ApiComentController", "add");
    $r->addRoute("comentarios/:ID", "PUT", "ApiComentController", "update");

    $r->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);