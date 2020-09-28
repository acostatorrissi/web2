<?php

class ProductView{

    function showProducts($productos) {

        echo "<table>";
        foreach($productos as $producto){
            echo "<tr>";
            echo "<td>".$producto->nombre."</td>";
            echo "<td>".$producto->descripcion."</td>";
            echo "<td>".$producto->precio."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    function showFooter(){
        require_once 'templates/footer.php';
    }

    function showHeader(){
        require_once 'templates/header.php';
    }
}



