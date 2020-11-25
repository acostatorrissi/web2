<?php
    require_once 'Controller/AuthController.php';
    require_once 'Controller/ProductController.php';
    require_once 'Controller/CategoryController.php';
    require_once 'View/UsserView.php';
    require_once 'View/ProductView.php';
    require_once 'View/CategoryView.php';
    require_once 'RouterClass.php';
    
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    $r->addRoute("login", "GET", "AuthController", "showLogin");
    $r->addRoute("verify", "POST", "AuthController", "verifyUsser");
    $r->addRoute("logout", "GET", "AuthController", "logOut"); // El helper se encarga de desloggear pero para no romper mvc..
    $r->addRoute("register", "GET", "AuthController", "showRegisterPage");//
    $r->addRoute("registerNewUsser", "POST", "AuthController", "registerNewUsser");//
    $r->addRoute("adminussers", "GET", "AuthController", "showUssers");//
    $r->addRoute("deleteusser/:ID", "GET", "AuthController", "deleteUsser");//
    $r->addRoute("setAdminRole/:ID", "GET", "AuthController", "setAdminRole");//
    $r->addRoute("setBasicRole/:ID", "GET", "AuthController", "setBasicRole");//

    $r->addRoute("home", "GET", "ProductController", "showHome");
    $r->addRoute("company", "GET", "ProductController", "showCompany");
    $r->addRoute("delete/:ID", "GET", "ProductController", "deleteProduct");
    $r->addRoute("carta", "GET", "ProductController", "showProducts");
    $r->addRoute("admin", "GET", "ProductController", "showAdminPage");
    $r->addRoute("insert", "POST", "ProductController", "insertProduct");
    $r->addRoute("edit/:ID", "GET", "ProductController", "showAdminEditPage");
    $r->addRoute("edit", "POST", "ProductController", "updateProduct"); 

    $r->addRoute("category", "GET", "CategoryController", "showCategory");
    $r->addRoute("category/:ID", "GET", "ProductController", "showCategoryProducts");//cambiado el controller
    $r->addRoute("admincategory", "GET", "CategoryController", "showAdminCategory");
    $r->addRoute("editcategory/:ID", "GET", "CategoryController", "showEditCategory");
    $r->addRoute("editcategory", "POST", "CategoryController", "updateCategory");
    $r->addRoute("insertCategory", "POST", "CategoryController", "insertCategory");
    $r->addRoute("deletecategory/:ID", "GET", "CategoryController", "deleteCategory");

    $r->addRoute("product/:ID", "GET", "ProductController", "showProductDetail");

    //Ruta por defecto.
    $r->setDefaultRoute("ProductController", "showHome");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>