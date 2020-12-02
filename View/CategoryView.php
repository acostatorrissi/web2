<?php

require_once('libs/smarty/Smarty.class.php');

class CategoryView{

    private $title;
    
    function showCategory($category){
        $smarty = new Smarty();
        $smarty->assign('categorias', $category);
        $smarty->assign('titulo', $this->title = "Categorias");
        $smarty->display('templates/category.tpl');
    }

    function showAdminCategory($category, $edit, $id){
        $smarty = new Smarty();
        $smarty->assign('categorias', $category);
        $smarty->assign('id', $id);
        $smarty->assign('edit', $edit);
        $smarty->assign('titulo', $this->title = "Categorias");
        $smarty->display('templates/category_admin.tpl');
    }
}
