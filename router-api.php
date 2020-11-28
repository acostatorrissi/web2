<?php

    require_once 'RouterClass.php';
    require_once './api/ApiController.php'


    $r = new Router();

    $r->addRoute("comments", "GET", "ApiController", "getAll");
    $r->addRoute("comments/:ID", "GET", "ApiController", "getComment");
    $r->addRoute("productComments/:ID", "GET", "ApiController", "getCommentsOfProduct");
    $r->addRoute("comments/:ID", "DELETE", "ApiController", "delete");
    $r->addRoute("comments", "POST", "ApiController", "add");
    $r->addRoute("comments/:ID", "PUT", "ApiController", "update");

    $r->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);