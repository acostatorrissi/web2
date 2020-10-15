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
                        <td><a class="black" href="product/{$producto->id}">Conocelo!</a></td>
                        <td><a class="black" href="category/{$producto->id_categoria}">{$producto->categoria_nombre}</a></td>
                    </tr>
                {/foreach}  
             </table> 
        </div>
    </div>
    
{include file="footer.tpl"}