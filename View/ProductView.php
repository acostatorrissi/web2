<?php

require_once('libs/smarty/Smarty.class.php');

class ProductView{

    private $title;

    function showProducts($products) {
        $smarty = new Smarty();
        $smarty->assign('productos', $products);
        $smarty->assign('titulo', $this->title = "nuestra carta");
        $smarty->display('templates/products.tpl'); 
    }

    function showCategory($category){
        $smarty = new Smarty();
        $smarty->assign('categorias', $category);
        $smarty->assign('titulo', $this->title = "Categorias");
        $smarty->display('templates/category.tpl');
    }

    function showAdminPage($productos, $drinks, $edit, $id){
        $smarty = new Smarty();
        $smarty->assign('productos', $productos);
        $smarty->assign('bebidas', $drinks);
        $smarty->assign('id', $id);
        $smarty->assign('edit', $edit);
        $smarty->display('templates/products_admin.tpl');
    }

    function showHome(){
        $smarty = new Smarty();
        $smarty->display('templates/index.tpl'); 
    }

    function showCompany(){
        $smarty = new Smarty();
        $smarty->display('templates/company.tpl'); 
    }
    
    function showProductsFromCat($productos, $id){
        $smarty = new Smarty();
        $smarty->assign('productos', $productos);
        $smarty->assign('titulo', $this->title = "productos");
        $smarty->display('templates/category_product.tpl'); 
    }
}



