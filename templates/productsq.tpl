{assign var="pages" value="0"}
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
                        <td>${$producto->precio}</td>
                        <td><a class="black" href="product/{$producto->id}">Conocelo!</a></td>
                        <td><a class="black" href="category/{$producto->id_categoria}">{$producto->categoria_nombre}</a></td>
                    </tr>
                {/foreach}  
            </table> 
        </div>
        <div class="container">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {for $pagin = 1 to $totalPaginas}
                        <li class="page-item
                            {if ($pagina+1)==$pagin}
                                active
                            {/if}
                        "><a class="page-link black" href="carta/{$pagin}">{$pagin}</a></li>
                    {/for}
                </ul>
            </nav>
        </div>
    
{include file="footer.tpl"}