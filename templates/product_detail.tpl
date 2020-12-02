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
         
            <div class="py-5 offset-1 col-lg-10">
                
                <form method="POST" id="comment-form">
                    <div class="form-group col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                        <span> Dejanos tu comentario</span>
                        <textarea  class="form-control" rows="3" cols="50" name="input_text" id="input_text" ></textarea>
                    </div>

                    <h6> Valoracion </h6>
                    <div class="form-group col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">

                        <select class="ranking" id="js-ranking"> <label for="js-ranking"> Calificaciones</label>
                            <option type="radio" name="ranking" value="5"  class="fas fa-star">5</option>
                            <option type="radio" name="ranking" value="4"  class="fas fa-star">4</option>
                            <option type="radio" name="ranking" value="3"  class="fas fa-star">3</option>
                            <option type="radio" name="ranking" value="2"  class="fas fa-star">2</option>
                            <option type="radio" name="ranking" value="1"  class="fas fa-star">1</option>
                        </select>
                    
                    </div>
                    <input type="hidden" class="form-control" id="js-input-hidden-email" name="usser-name" value="{$usser['USSER_EMAIL']}">
                    <input type="hidden" class="form-control" id="js-input-hidden-id" name="usser-id" value="{$usser['USSER_ID']}">
                     <input type="hidden" class="form-control" id="js-data-id-producto" name="data-id-producto" value="{$producto->id}">
                </form>
                <div class="text-center col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                    <button id="comment-button" class="btn btn-check">Agregar</button>
                 </div>

            </div>

            <div class="row justify-content-center">
                    <div class="col-md-8" id="vue_container" usser="{$usser['USSER_ROLE']}" data-id-producto="{$producto->id}">
            {else}
                    <div class="col-md-8" id="vue_container2" usser ="2" data-id-producto="{$producto->id}">
            {/if}
                        {include file="./vue/comentarios.vue"}
                     </div>
            </div>
             
        </div>

    </div>
    
    <script src="./js/javascript.js"></script>
{include file="footer.tpl"}