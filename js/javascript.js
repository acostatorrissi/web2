"use strict";
let btnSuscribirse = document.querySelector("#btn-subs");

let btnVerificar = document.querySelector("#btn-check");

let acceso = document.querySelector("#acceso");

let inputCaptcha = document.querySelector("#inputCaptcha");

let showCaptcha = document.querySelector("#showCaptcha");

let captcha="";
//declaro captcha y le asigno un valor vacío, para que no valga "undefined"
//no la declaro dentro de la función generarCaptcha() porque si el usuario no verifica la función se vuelve a ejecutar

let caracteres = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

btnSuscribirse.addEventListener("click", showFormCaptcha);

function showFormCaptcha(){
    let formCaptcha = document.querySelectorAll(".formulario")[1];
    formCaptcha.classList.remove("hidden");
} /*(al hacer querySelectorAll, seleccionamos una coleccion HTML de objetos del DOM
al poner [1] seleccionamos el segundo div con class="formulario" y le sacamos la clase que lo oculta)*/

generarCaptcha();

showCaptcha.innerHTML = captcha;
//lo pongo después de la funcion así no lo muestra vacío en la página

btnVerificar.addEventListener("click", verificar);

//verificacion de acceso
function verificar(){
    if (showCaptcha.innerHTML == inputCaptcha.value){
        acceso.innerHTML = "Tu suscripción se realizó con exito."
        //si el captcha mostrado es igual al ingresado, el parrrafo "acceso" cambia su valor a "mensaje enviado.."
    }else{
        acceso.innerHTML = "Ingreso erróneo, intente nuevamente"
        generarCaptcha();
        showCaptcha.innerHTML = captcha;
        //sino, cambia su valor a "mensaje erroneo.." y se ejecuta la funcion nuevamente para generar un captcha nuevo y evitar el hack 
       //la ultima linea es para que aparezca en el parrafo el nuevo captcha y no el anterior
    }
}

//Generador de captcha random
function generarCaptcha(){
    captcha="";
    //vuelvo a dejar la variable vacía, si el usuario no verifica se vuelve a ejecutar y no se juntan los captchas

    for ( let i = 1; i<=6; i++){
   captcha += caracteres.charAt(Math.floor(Math.random()*caracteres.length)); 
   //captcha sea igual a su valor original + lo que sigue, o sea empieza en ""
   //caracteres.lenght me dice la longitud del String caracteres, o sea 62, multiplicas hasta donde queres q tome valores
   //y el math.floor te redondea para abajo para eliminar los decimales, no para arriba por las posiciones (0 a 61)
   //charAt es para q te diga el caracter en tal posición (la posicion random que tiro el codigo)
   //el bucle for ejecuta la sentencia 6 veces, o sea q nuestro captcha tiene 6 caracteres
        }
}