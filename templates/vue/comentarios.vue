<div id="vue-comment"> 
    <ul id="comment-list" class="list-group">

        <li v-for="comment in comments" data-id-comment="" class="list-group-item">
        
            {{comment.texto}} 
        </li>
    </ul>

</div>


{literal}
    
    <div class ="vue-comentarios">
        <div class="container-fluid">
                    <ul>
                        <li class="li-comment" v-for="comment in comments">
                        <div class="row">
                        <div class="offset-1 col-10">
                            <div class="card bg-secondary">
                                <div class="row card-header">
                                    <div class="col-5 text-left">
                                            <span>{{comment.puntaje}} <i class="fas fa-star"></i></span>
                                    </div>
                                    <div class="col-7 text-right">
                                        <span>{{ comment.fecha }}</span>
                                    </div>
                                </div>
                                <div class="card-body cuerpo-comment">
                                    <blockquote class="blockquote mb-0">
                                    <p>{{ comment.texto }}</p>
                                    <footer class="blockquote-footer">{{ comment.nombreUsuario }}</footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="offset-1 col-10">
                        <span v-if="admin == 1"><a v-on:click="del(comment.id_comentario)"  :data-id="comment.id_comentario" class="btn-eliminar"><i class="fas fa-trash-alt"></i></a></span>
            </div>
        </div>
                        </li>
                    </ul>
            </div>
        </div>
    </div>

{/literal}