"use strict"

const app  = new Vue({
    el: '#vue-comment',
    data:{
        comments: [],
        admin: 1
    },
    methods:{
        
    }
});

function loadPage(){
    
    getComents();

    document.querySelector('comment-form').addEventListener('submit', addComent);
    
    function getComents(){
        let id = document.querySelector('#comment-form').getAttribute('data-id-product');
        fetch('api/comments/' + id)
        .then(response => response.json())
        .then(comentarios => app.comments = comentarios)
        .catch(error=> console.log(error));
    }

    
    function deleteComment($id){
        fetch('api/comments/' + id, {method: "DELETE"})
        .then(response=>{
            if(!response.ok);

            return response.json();
        })
        .then(response =>{
            deleteCommentById($id);
            app.commentsLength = app.comments.length;
        })
    }

 
    function addComent(){

        e.preventDefault();

        const coment = {
            texto = document.querySelector('input[name="texto"]').value,
            ranking = document.querySelector('input[name="ranking"]').value,
            id_usser = document.querySelector('input[name="id_usser"]').value,
            id_producto = document.querySelector('input[name="id_producto"]').value
        }
        
        fetch('api/comments',{
            method: 'POST',
            header: {'Content-type': "application/json"},
            body: JSON.stringify(comentario)
        })
        .then(response => response.json())
        .then(comentario => getComents())
        .catch(error=> console.log(error));
    }


}
