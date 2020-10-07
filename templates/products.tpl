{include file="header.tpl"}
    <div class="container">
        <div id="tablaComida">    
            <table>
                <thead>
                    <th>{$titulo|upper}</th>
                </thead>
                {foreach from=$productos item=producto}
                    <tr>
                        <td class="bold">{$producto->nombre|upper}</td>
                        <td>{$producto->descripcion}</td>
                        <td>{$producto->precio}</td>
                    </tr>
                {/foreach}  
             </table> 
        </div>
    </div>
{include file="footer.tpl"}