<div class="formulario table">

    {foreach from=$categorias item=categoria}      <!-- desempaquetamos la data que viene en forma de array -->      
        {if $categoria->id_categoria == $id}
             <form action="editCategory" method="POST">
                <h2>Editar producto</h2>
                <label>Nombre de categoria:</label><input name="nombre" required value="{$categoria->nombre}">
                <label>ID:<label><input name="id" value={$id} readonly> <!--readonly para que no puedan cambiar el valor del id pero se vea (2 motivos: brindar info y guardar el valor para usarlo dsp)-->           
        {/if}
    {/foreach}
    
    <button id="btn-agregar-item">Editar Categoria</button>   
    </form>
</div> 
