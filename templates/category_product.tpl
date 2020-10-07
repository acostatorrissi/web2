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
                        <td>${$producto->precio}</td>
                        <td><a href="product/{$producto->id}">Conocelo!</a></td>
                    </tr>
                {/foreach}  
             </table> 
        </div>
    </div>
    <button><a href="category">Back</a></button>
{include file="footer.tpl"}