     
<div class="formulario table">
    <div class="container"> 
        <form action="insert" method="POST">
            <div class="form-group">
                <label>Nombre </label>
                <input name="nombre" class="form-control" type="text" required>
            </div>
            <div class="form-group">
                <label>Descripción </label>
                <input  name="descripcion" class="form-control" type="text" required>
            </div>
            <div class="form-group">
                <label>Precio </label>
                <input name="precio" class="form-control" type="number" required>
            </div>
            <select name="id_categoria" id="select-tabla">
                <option value="2">Menu</option>
                <option value="1">Bebidas</option>
            </select> 
        
            <button id="btn-agregar-item" class="btn btn-check">Agregar ítem</button>   
        </form>
    </div>

</div>

