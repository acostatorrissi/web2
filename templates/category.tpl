{include file="header.tpl"}
    <h2></h2>
    <div class="container">
        
        <div id="tablaComida">   
                
            <table>
                <thead>
                    <th>{$titulo|upper}</th>
                    {foreach from=$categorias item=categoria}
                        <tr>
                            <td>{$categoria->nombre|upper}</td></a>
                            <td> <a href='category/{$categoria->id_categoria}'> Ver mas</a></td>
                        </tr>
                    {/foreach} 
                </thead>  
            </table> 
            
        </div>
        
    </div>
{include file="footer.tpl"}