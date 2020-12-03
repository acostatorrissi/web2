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
   
    function showProductDetail($product, $usser){
        $smarty = new Smarty();
        $smarty->assign('producto', $product);
        $smarty->assign('usser', $usser);
        $smarty->display('templates/product_detail.tpl');
    }

    function showProductsFromCat($productos, $id){
        $smarty = new Smarty();
        $smarty->assign('productos', $productos);
        $smarty->assign('titulo', $this->title = $productos[0]->categoria_nombre);
        $smarty->display('templates/category_product.tpl'); 
    }

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

    function showProductsByPage($products, $pagina, $totalPaginas){
        $smarty = new Smarty();
        $smarty->assign('productos', $products);
        $smarty->assign('titulo', $this->title = "nuestra carta");
        $smarty->assign('totalPaginas', $totalPaginas);
        $smarty->assign('pagina', $pagina);
        $smarty->display('templates/productsq.tpl');
    }
}



