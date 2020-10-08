<div class="container">
    <div class="formulario table">
        <form action="editcategory" method="POST">
            <h2>Editar producto</h2>
            <div class="form-group">
                <label>Nombre de categoria: </label>
                <input name="nombre"  class="form-control" value="" type="text" required>
            </div>
            <div class="form-group">
                <label>ID: </label>
                <input name="id" class="form-control" value={$id} type="text" readonly>
            </div>
            <button id="btn-agregar-item" class="btn btn-check">Editar Categoria</button>   
        </form>
    </div> 
</div>
