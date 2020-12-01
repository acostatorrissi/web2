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
                    <td>${$producto->precio} </td>
                    <td>{$producto->categoria_nombre}</td>
                    <td> <a class="black" href="delete/{$producto->id}"><i class="far fa-trash-alt btn-delete black"></i></a> <a href="edit/{$producto->id}"> <i class="far fa-edit btn-edit black"></i></a></td>
                    <td><a class="black" href="product/{$producto->id}">Detalle</a></td>
                </tr>
            {/foreach}  
        </table> 
    </div>    
</div>

