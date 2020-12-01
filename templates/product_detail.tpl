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
    
            {if $usser eq true}
            <h4>Comentarios</h4>
            <div class="py-5 offset-1 col-lg-10">
                
                <form method="POST" id="comment-form">
                    <div class="form-group col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                        <span> Dejanos tu comentario</span>
                        <textarea  class="form-control" rows="3" cols="50" name="texto"></textarea>
                    </div>

                    <div class="form-group col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">

                        <div class="ranking"> 
                            <input type="radio" name="ranking" value="5" id="5" class="fas fa-star"><label for="5"></label>
                            <input type="radio" name="ranking" value="4" id="4" class="fas fa-star"><label for="4"></label> 
                            <input type="radio" name="ranking" value="3" id="3" class="fas fa-star"><label for="3"></label>
                            <input type="radio" name="ranking" value="2" id="2" class="fas fa-star"><label for="2"></label> 
                            <input type="radio" name="ranking" value="1" id="1" class="fas fa-star"><label for="1"></label>
                        </div>
                    
                    </div>
                    <div class="text-center col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                        <button type="sumbit" class="btn btn-check">Agregar</button>
                    </div>
                </form>

            </div>

            <div class="row justify-content-center">
                    <div class="col-md-8" id="vue_container" usser-id="{$usser['USSER_ID']}" usser-name="{$usser['USSER_EMAIL']}" usser = "{$usser['USSER_ROLE']}" data-id-producto="{$producto->id}">
            {else}
                    <div class="col-md-8" id="vue_container" usser = "2" data-id-producto="{$producto->id}">
            {/if}
                        {include file="./vue/comentarios.vue"}
                     </div>
            </div>
             
        </div>

    </div>
    
    <script src="./js/javascript.js"></script>
{include file="footer.tpl"}