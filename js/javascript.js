"use strict"

const app  = new Vue({
    el: '#vue-comment',
    data:{
        comments: [],
        commentsLength: 0,
        admin: 1
    },
    methods:{
        
    }
});

function loadPage(){

    document.querySelector('comment-form').addEventListener('submit', addComent);
    
    function getComents(){
        fetch('api/comments/' + id_producto)
        .then(response => response.json())
        .then(response =>{
            app.comments = response;
            app.commentsLength = response.length;
        })
        .catch(error=> console.log(error));
    }

    /*
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

*/
}
