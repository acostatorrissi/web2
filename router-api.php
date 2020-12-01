<?php

    require_once 'RouterClass.php';
    require_once 'Controller/CommentController.php';


    $r = new Router();

    $r->addRoute("productComments/:ID", "GET", "CommentController", "getComment");
    //$r->addRoute("productComments/:ID", "GET", "CommentController", "getCommentsOfProduct");
    $r->addRoute("comments/:ID", "DELETE", "CommentController", "delete");
    $r->addRoute("comments", "POST", "CommentController", "add");


    $r->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);