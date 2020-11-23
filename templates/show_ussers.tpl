{include file="header_admin.tpl"}

<div class="container">
    
    <div id="tabla-category"> 
        <table>
            <thead>
                <th>{$titulo|upper}</th>
                {foreach from=$ussers item=usser}
                    <tr>
                        <td class='bold'>{$usser->nombre|upper}</td>
                        <td> 
                            <a href="deleteusser/{$usser->id}" class="btn btn-danger"> Eliminar Usuario </a> 
                            {if $usser->rol == 0}
                                <a href="setAdminRole/{$usser->id}" class="btn btn-secondary">Hacer Administrador</a>
                            {else}
                                <a href="setBasicRole/{$usser->id}" class="btn btn-secondary">Quitar Administrador</a>
                            {/if}
                         </td>
                        </tr>
                {/foreach} 
            </thead>  
        </table>
    </div>   
</div>

{include file="footer.tpl"}