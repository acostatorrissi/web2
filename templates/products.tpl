{include file="header.tpl"}
    
        <div class="container">    
            <table id="tablaComida">
                <thead>
                    <th>{$titulo|upper}</th>
                </thead>
                {foreach from=$productos item=producto}
                    <tr>
                        <td class="bold">{$producto->nombre|upper}</td>
                        <td>{$producto->descripcion}</td>
                        <td>{$producto->precio}</td>
                        <td><a href="product/{$producto->id}">Conocelo!</a></td>
                    </tr>
                {/foreach}  
             </table> 
        </div>
    
{include file="footer.tpl"}