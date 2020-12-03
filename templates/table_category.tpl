
<div class="container">
    
    <div id="tabla-category">   
            
        <table>
            <thead>
                <th>{$titulo|upper}</th>
                {foreach from=$categorias item=categoria}
                    <tr>
                        <td class='bold'>{$categoria->nombre|upper}</td>
                        <td> <a class="black" href='category/{$categoria->id_categoria}'>Ver más</a> </td>
                        <td> <a href="deletecategory/{$categoria->id_categoria}"> <i class="far fa-trash-alt btn-delete black"></i></a> <a href="editcategory/{$categoria->id_categoria}"> <i class="far fa-edit btn-edit black"></i></a> </td>
                        </tr>
                {/foreach} 
            </thead>  
        </table> 

        {if $edit==true}
            {include file="category_edit.tpl"} 
        {else}
            {include file="category_insert.tpl"}
        {/if}
        
    </div>
    
</div>