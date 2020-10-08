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
                    <td> <a href="delete/{$producto->id}"><i class="far fa-trash-alt btn-delete"></i></a> <a href="edit/{$producto->id}"> <i class="far fa-edit btn-edit"></i></a></td>
                </tr>
            {/foreach}  
        </table> 
    </div>    
</div>

