<div class="formulario table">
   
    {foreach from=$productos item=producto}      <!-- desempaquetamos la data que viene en forma de array -->      
        {if $producto->id == $id}
             <form action="edit" method="POST">
                <h2>Editar producto</h2>
                <label>Nombre</label><input name="nombre" required="required" value="{$producto->nombre}">
                <label>Descripción </label><input  name="descripcion" type="text" value="{$producto->descripcion}" required>
                <label>Precio </label><input name="precio" type="number" value={$producto->precio} required>
                <label>Id<label><input name="id" value={$id} readonly> <!--readonly para que no puedan cambiar el valor del id pero se vea (2 motivos: brindar info y guardar el valor para usarlo dsp)-->           
        {/if}
    {/foreach}