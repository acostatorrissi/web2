<div class="formulario table">
    <form action="edit" method="POST">
        <h2>Editar producto</h2>
        <label>Nombre</label><input name="nombre" type="text" required>
        <label>Descripción </label><input  name="descripcion" type="text" required>
        <label>Precio </label><input name="precio" type="number" required>
        <label>Id<label><input name="id" value={$id} readonly> <!--readonly para que no puedan cambiar el valor del id pero se vea (2 motivos: brindar info y guardar el valor para usarlo dsp)-->
        <select name="id_categoria" id="select-tabla">
            <option value="2">Menu</option>
            <option value="1">Bebidas</option>
        </select> 
        <button id="btn-agregar-item">Editar ítem</button>   
    </form>
</div> 
