{literal}
<div id="app-comments">
    <h3>Comentarios</h3>
    <div class=" mt-20">
        <div class="d-flex justify-content-center row">
            
            <ul>    
                <li style="none"  class="li-comment" v-for="comment in comments">
            
                    <div class="row">
                        <div class=" col-12">
                                <div class="offset-1 col-20 text-right" v-if="admin">
                                    <i v-on:click="deleteComment($event)" class="far fa-trash-alt btn-delete black" :id="comment.id"> </i>
                                </div>
                            <div class="card col-12 bg">
                                <div class="row card-header">
                                        
                                        <div class="col-20 text-left">
                                            <span>{{comment.ranking}} <i class="fas fa-star"></i></span>
                                        </div>
                                        <div class="col-20 text-right">
                                            <span>{{comment.email_usser}}</span>
                                        </div>
                                </div>
                    
                                <div class="d-flex flex-row comment-user justify-content-between">

                                    <div class="ml-2">
                                        <div class="mt-2">
                                            <p class="comment-text">{{comment.texto}}</p>
                                        </div>
                                    </div>
                            
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
{/literal}


        