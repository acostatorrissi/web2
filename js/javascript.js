
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
    loadForm();
});

function loadForm(){
    let form = document.querySelector('#comment-form');
    if(form!= null){
        document.querySelector('#comment-button').addEventListener('click', addComent);
    }
}

const productId = document.querySelector('#js-data-id-producto').value;
const usserName = document.querySelector('#js-input-hidden-email').value;
const usserId = document.querySelector('#js-input-hidden-id').value;
let ranking = document.querySelector('#js-ranking').value;

console.log(productId);


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
            getComents();
            app.commentsLength = app.comments.length;
        })
        .catch(error=> console.log(error));

        getComents();
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

 
    function addComent(event){

        event.preventDefault();


        const comment = {
            "texto": document.querySelector('#input_text').value,
            "puntaje": ranking,
            "id_usser": usserId,
            "id_producto": productId
        }
       
        
        fetch('api/comments',{
            method: 'POST',
            header: {'Content-type': "application/json"},
            body: JSON.stringify(comment)
        })
        .then(response => {
            if(!response.ok)    
            return response.json();
        })
        .then(comment => {
            app.comments.push(comment);
            app.commentsLength = app.comments.length;
        })
        .catch(error => console.log(error));
        
    }
 




