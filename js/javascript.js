document.addEventListener("DOMContentLoadad", loadPage);

function loadPage(){
    "use strict";
    let btnSuscribirse = document.querySelector("#btn-subs");

    let btnVerificar = document.querySelector("#btn-check");

    let acceso = document.querySelector("#acceso");

    let inputCaptcha = document.querySelector("#inputCaptcha");

    let showCaptcha = document.querySelector("#showCaptcha");

    let captcha="";

    let caracteres = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    btnSuscribirse.addEventListener("click", showFormCaptcha);

    function showFormCaptcha(){
        let formCaptcha = document.querySelectorAll(".formulario")[1];
        formCaptcha.classList.remove("hidden");
    } 

    generarCaptcha();

    showCaptcha.innerHTML = captcha;


    btnVerificar.addEventListener("click", verificar);


    function verificar(){
        if (showCaptcha.innerHTML == inputCaptcha.value){
            acceso.innerHTML = "Tu suscripción se realizó con exito."
            
        }else{
            acceso.innerHTML = "Ingreso erróneo, intente nuevamente"
            generarCaptcha();
            showCaptcha.innerHTML = captcha;
        
        }
    }

    function generarCaptcha(){
        captcha="";
    
        for ( let i = 1; i<=6; i++){
            captcha += caracteres.charAt(Math.floor(Math.random()*caracteres.length)); 
    
        }
    }

}
