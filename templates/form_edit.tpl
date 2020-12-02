
<div class="formulario table">
    <div class="container">
        {foreach from=$productos item=producto}      <!-- desempaquetamos la data que viene en forma de array -->      
            {if $producto->id == $id}
                <form action="edit" method="POST" enctype="multipart/form-data">
                    <h2>Editar producto</h2>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input name="nombre" required="required" value="{$producto->nombre}">
                    </div>
                     <div class="form-group">
                        <label>Descripción </label>
                        <input  name="descripcion" type="text" value="{$producto->descripcion}" required>
                    </div>
                     <div class="form-group">
                        <label>Precio </label>
                        <input name="precio" type="number" value={$producto->precio} required>
                    </div>
                     <div class="form-group">
                        <label>Imagen </label>
                        <input name="imagen" class="form-control" type="file">
                        <div>
                            <img src="{$producto->imagen}" width = "75" height = "75">
                        </div>
                    </div>
                     <div class="form-group">
                        <label>Id<label>
                        <input name="id" value={$id} readonly> <!--readonly para que no puedan cambiar el valor del id pero se vea (2 motivos: brindar info y guardar el valor para usarlo dsp)-->
                    </div>
                    
            {/if}
        {/foreach}    
