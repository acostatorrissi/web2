{include file="header.tpl"}
    <h2></h2>
    <div class="container">
        
        <div id="tabla-category">   
                
            <table>
                <thead>
                    <th>{$titulo|upper}</th>
                    {foreach from=$categorias item=categoria}
                        <tr>
                            <td class='bold'>{$categoria->nombre|upper}</td></a>
                            <td> <a class="black" href='category/{$categoria->id_categoria}'>Ver más</a> </td>
                        </tr>
                    {/foreach} 
                </thead>  
            </table> 
            
        </div>
        
    </div>
{include file="footer.tpl"}