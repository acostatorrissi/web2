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
    $r->addRoute("delete/:ID", "GET", "ProductController", "deleteProduct");
    $r->addRoute("carta", "GET", "ProductController", "showProducts");
    $r->addRoute("admin", "GET", "ProductController", "showAdminPage");
    $r->addRoute("category", "GET", "CategoryController", "showCategory");
    $r->addRoute("insert", "POST", "ProductController", "insertProduct");
    $r->addRoute("edit/:ID", "GET", "ProductController", "showAdminEditPage");
    $r->addRoute("edit", "POST", "ProductController", "updateProduct"); 

    $r->addRoute("category/:ID", "GET", "ProductController", "showCategoryProducts");//cambiado el controller de categoria a producto
    $r->addRoute("categoryadmin", "GET", "CategoryController", "showAdminCategory");
    $r->addRoute("editcategory/:ID", "GET", "CategoryController", "showEditCategory");
    $r->addRoute("editcategory", "POST", "CategoryController", "updateCategory");
    $r->addRoute("insertCategory", "POST", "CategoryController", "insertCategory");
    $r->addRoute("deletecategory/:ID", "GET", "CategoryController", "deleteCategory");

    //Ruta por defecto.
    $r->setDefaultRoute("ProductController", "showHome");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>