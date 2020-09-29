{include file="header.tpl"}
    <div class="container">
        <div id="tablaComida">    
            <table>
                <thead>
                    <th>MENU</th>
                </thead>
                {foreach from=$productos item=producto}
                    <tr>
                        <td class="bold">{$producto->nombre|upper}</td>
                        <td>{$producto->descripcion}</td>
                        <td>${$producto->precio}</td>
                    </tr>
                {/foreach}  
             </table> 
        </div>
        <div id="tablaBebida">  
            <table>
                <thead>
                    <th>BEBIDAS</th>
                </thead>
                {foreach from=$bebidas item=bebida}
                    <tr>
                        <td class="bold">{$bebida->nombre|upper}</td>
                        <td>{$bebida->descripcion}</td>
                        <td>${$bebida->precio}</td>
                    </tr>
                {/foreach}
            </table> 
        </div> 
        
    </div>
{include file="footer.tpl"}