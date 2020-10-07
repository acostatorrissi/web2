<div class="formulario table">
    <form action="edit" method="POST">
        <h2>Editar producto</h2>
        <label>Nombre de categoria: </label><input name="nombre" value="" type="text" required>
        <label>ID: </label><input name="id" value={$id} type="text" readonly>
        <button id="btn-agregar-item">Editar Categoria</button>   
    </form>
</div> 