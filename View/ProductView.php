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

    function showProductDetail($product){
        $smarty = new Smarty();
        $smarty->assign('producto', $product);
        $smarty->display('templates/product_detail.tpl');
    }

    function showProductsFromCat($productos, $id){
        $smarty = new Smarty();
        $smarty->assign('productos', $productos);
        $smarty->assign('titulo', $this->title = $productos[0]->categoria_nombre);
        $smarty->display('templates/category_product.tpl'); 
    }

    //esto iria en el mvc del admin que inicio sesion
    //function showAdminPage($productos, $drinks, $edit, $id){
     function showAdminProducts($productos, $edit, $id, $categories){ 
        $smarty = new Smarty();
        $smarty->assign('productos', $productos);
        $smarty->assign('categorias', $categories);
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
}



