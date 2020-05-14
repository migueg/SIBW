function validaAñadir(){
    var titulo = document.getElementById('title').value;
    var org = document.getElementById('org').value;
    var fecha = document.getElementById('date').value;
    var im1 = document.getElementById('im1').value;
    var t1 = document.getElementById('t1').value;
    var im2 = document.getElementById('im2').value;
    var t2 = document.getElementById('t2').value;
    var d1 = document.getElementById('d1').value;
    var d2 = document.getElementById('d2').value;
    var we = document.getElementById('webEvento').value;
    var wo = document.getElementById('weborg').value;
    var twit = document.getElementById('twitter').value;
    var face = document.getElementById('facebook').value;
    var boton = document.getElementById('boton');

    if(titulo == "" || org == "" || fecha == "" || im1 =="" ||
    t1 == "" || im2 == "" || t2 == "" || d1 == "" || d2 == "" 
    || we == "" || wo == "" || twit == "" || face == ""){
        boton.setCustomValidity("Todos los campos deben estar rellenos");

    }else{
        boton.setCustomValidity("");
    }

}