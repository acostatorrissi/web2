<?php
    require_once 'Controller/ProductController.php';
    require_once 'Controller/CategoryController.php';
    require_once 'View/ProductView.php';
    require_once 'View/CategoryView.php';
    require_once 'RouterClass.php';
    

    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    $r->addRoute("home", "GET", "ProductController", "showHome");
    $r->addRoute("company", "GET", "ProductController", "showCompany");
    $r->addRoute("category", "GET", "CategoryController", "showCategory");
    $r->addRoute("category/:ID", "GET", "CategoryController", "showCategoryProducts");
    $r->addRoute("delete/:ID", "GET", "ProductController", "deleteProduct");
    $r->addRoute("carta", "GET", "ProductController", "showProducts");
    $r->addRoute("admin", "GET", "ProductController", "showAdminPage");
    $r->addRoute("insert", "POST", "ProductController", "insertProduct");
    $r->addRoute("edit/:ID", "GET", "ProductController", "showAdminEditPage");
    $r->addRoute("edit/edit", "POST", "ProductController", "updateProduct"); //el doble edit es porque ya se encuentra en edit y el form le va a sumar un edit, se podria cambiar el nombre en el form y aca

    //Ruta por defecto.
    $r->setDefaultRoute("ProductController", "showHome");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>