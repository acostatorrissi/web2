<?php

require_once('libs/smarty/Smarty.class.php');

class ProductView{

    function showProducts($productos, $drinks) {
        $smarty = new Smarty();
        $smarty->assign('productos', $productos);
        $smarty->assign('bebidas', $drinks);
        $smarty->display('templates/products.tpl'); 
    }

    function showAdminPage($productos, $drinks, $edit){
        $smarty = new Smarty();
        $smarty->assign('productos', $productos);
        $smarty->assign('bebidas', $drinks);
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



