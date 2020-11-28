{include file="header.tpl"}
<div class="container">
    <div class="wrapperProduct">
        <h1 class="hProduct">{$producto->nombre|upper}</h1>
        <p class="pProduct">{$producto->descripcion}</p>
        <h2>${$producto->precio}</h2>
    </div>
    <figure class="figProduct">
            <img src={$producto->img_url} alt="{$producto->nombre}" class="imgProduct">
    </figure>
</div>
    <div class="col-lg-50">
        <div class="col-md-50">
        <div class="row justify-content-center">
            <h3>Comentarios</h3>
            <div class="py-5 offset-1 col-lg-10">
                <form method="POST" id="comment-form" data-id-product = {$producto->id}>
                    
                    <div class="form-group col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                        <textarea  class="form-control" rows="3" cols="50" name="texto"></textarea>
                    </div>

                    <input type="hidden" class="form-control" name="id_usser" value="{}">
                    <input type="hidden" class="form-control" name="id_producto" value="{}">

                    <div class="form-group col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                        <select  name="ranking" class="form-control">
                            <option selected disabled hidden>Ranking</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                        </select>
                    </div>
                    <div class="text-center col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                        <button type="sumbit" class="btn btn-check">Agregar</button>
                    </div>
                </form>
            </div>
            
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                {include file="./vue/comentarios.vue"}
            </div>
        </div>

    </div>
    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="../js/javascript.js"></script>
{include file="footer.tpl"}