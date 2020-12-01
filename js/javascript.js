
const app = new Vue({
    el: '#app-comments',
    data: {
        comments: [],
        admin:false,
        commentsLength: 0
    },
    methods: {
        deleteComment: function (event) {
            commentId = event.currentTarget.id;
            deleteComment(commentId);
        }
    }
});

document.addEventListener('DOMContentLoaded', () => {
    "use strict"
    checkRole();
    getComents();
});

function loadForm(){
    let form = document.querySelector('#comment-form');
    if(form!= null){
        document.querySelector('comment-form').addEventListener('submit', addComent);
    }
}

const productId = document.querySelector('#vue_container').getAttribute('data-id-producto');
const usserName = document.querySelector('#vue_container').getAttribute("usser-name");
const usserId = document.querySelector('#vue_container').getAttribute("usser-id");

    function getComents(){ 
        fetch('api/productComments/' + productId)
        .then(response => response.json())
        .then(comentarios => app.comments = comentarios)
        .catch(error=> console.log(error));
    }
    

    function deleteComment($id){
        fetch('api/comments/'+ $id, {method: "DELETE"})
        .then(response=>{
            if(!response.ok);
            return response.json();
        })
        .then(response =>{
            deleteCommentById($id);
            app.commentsLength = app.comments.length;
        })
        .catch(error=> console.log(error));
    }


    
    function deleteCommentById(id){
        for (let i = 0; i < app.commentsLength; i++){
            if(app.comments[i].id == id){
                app.comments.splice(i, 1);
                return;
            }
        }
    }

    function checkRole(){
        $logged = document.querySelector('#vue_container').getAttribute('usser');
        if($logged == 1){
            app.admin = true;
        }
    }

 
    function addComent(){

        e.preventDefault();

        selection = document.querySelectorAll('input[name="ranking"]');
        let ranking;

        selection.forEach(element => {
            if(element.checked){
                ranking = element.value;
            }
        });


        const coment = {
            nombre_usuario: usserName,
            id_producto: productId,
            id_usuario: usserId,
            puntaje: ranking,
            texto: document.querySelector('#input-text').value
        }
        
        fetch('api/comments',{
            method: 'POST',
            header: {'Content-type': "application/json"},
            body: JSON.stringify(comment)
        })
        .then(response => {
            if(!response.ok)
                console.log(response);
    
            return response.json();
        })
        .then(comment => {
            app.comments.push(comment);
            app.commentsLength = app.comments.length;
        })
        .catch(error => console.log(error));
        
    }
 




