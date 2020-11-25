"use strict";

let app  = new Vue({
    el: '#vue-comment',
    data:{
        comments: []
    }
})

document.addEventListener("DOMContentLoadad", () =>{
    getComents();

    document.querySelector('comment-form').addEventListener('submit', e =>{
        e.preventDefault(); //evita envio del form 
        addComent();
    })
});

function loadPage(){
    
    
    function getComents(){
        fetch('api/comentarios/')
        .then(response => response.json())
        .then(comentarios => render(comentarios))
        .catch(error=> console.log(error));
    }



    function addComent(){

        const coment = {
            texto = document.querySelector('input[name="texto"]').value,
            ranking = document.querySelector('input[name="ranking"]').value,
            usser = document.querySelector('input[name="id_usser"]').value,
            producto = document.querySelector('input[name="id_producto"]').value
        }
        
        fetch('api/comentarios',{

            method: 'POST',
            header: {'Content-type': "application/json"},
            body: JSON.stringify(comentario)
        })
        .then(response => response.json())
        .then(comentario => getComents())
        .catch(error=> console.log(error));
    }
}
