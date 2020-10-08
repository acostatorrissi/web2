<div class="container">
    <div class="formulario table">
        {foreach from=$categorias item=categoria}      <!-- desempaquetamos la data que viene en forma de array -->      
            {if $categoria->id_categoria == $id}
                <form action="editcategory" method="POST">
                    <h2>Editar producto</h2>
                    <div class="form-group">
                        <label>Nombre de categoria: </label>
                        <input name="nombre"  class="form-control" value="{$categoria->nombre}" type="text" required>
                    </div>
                    <div class="form-group">
                        <label>ID: </label>
                        <input name="id" class="form-control" value={$id} type="text" readonly>
                    </div>
            {/if}
        {/foreach}
            <button id="btn-agregar-item" class="btn btn-check">Editar Categoria</button>   
        </form>
    </div> 
</div>
