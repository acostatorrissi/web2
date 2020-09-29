<div class="formulario table">
    <form action="insert" method="POST">
        <label>Nombre </label><input name="nombre" type="text" required>
        <label>Descripción </label><input  name="descripcion" type="text" required>
        <label>Precio </label><input name="precio" type="number" required>
        <select name="id_categoria" id="select-tabla">
            <option value="2">Menu</option>
            <option value="1">Bebidas</option>
        </select> 
        <button id="btn-agregar-item">Agregar ítem</button>   
    </form>
</div> 
