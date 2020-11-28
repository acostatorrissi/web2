
{literal}
<div class ="vue-comment">
    <div class="container-fluid">
        <ul>
            <li class="li-comment" v-for="comment in comments" >
                <div class="row">
                    <div class="offset-1 col-10">
                        <div>
                            <div class="row card-header">
                                <div class="col-5 text-left">
                                    <span>{{comment.ranking}}<i class="fas fa-star"></i></span>
                                </div>
                            </div>
                            <div class="card-body cuerpo-comment">
                                <blockquote class="blockquote mb-0">
                                <p>{{comment.id_usser}}</p>
                                <footer class="blockquote-footer">{{comment.texto}}</footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                <div class="row">
                <div class="offset-1 col-10">
                    <span v-if="admin == 1"><a v-on:click="del(comment.id)" :data-id="comment.id" class="btn-eliminar"><i class="fas fa-trash-alt"></i></a></span>
                </div>
            </li>
        </ul>
    </div>
</div>
{/literal}