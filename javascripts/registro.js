function validar(){
    var user = document.getElementById('user').value;
    var password =  document.getElementById("pass");
    var repass = document.getElementById("repass");
    var mail = document.getElementById("correo");
    var nombre = document.getElementById("name").value;
    var apellidos = document.getElementById("subname").value;
    var fecha = document.getElementById("date").value;
    var span = document.getElementById("boton");

    //console.log(password.value);
   // console.log(repass.value);

   if(password.value.length < 8){
       password.setCustomValidity("La contraseña tiene que tener como mínimo 8 caracteres");
   }
    else if(password.value != repass.value){
        password.setCustomValidity("Las contraseñas no coinciden");
        
        
    }else{
        password.setCustomValidity("");
    }
    
    if(mail.validity.typeMismatch){
        mail.setCustomValidity("Debes introducir una dirección de correo");
    }else{
        mail.setCustomValidity("");
    }

    if(user == "" || password.value == "" || repass.value =="" || 
    mail.value == "" ||  nombre == "" || apellidos == "" || fecha==""){
     
        span.setCustomValidity("Todos los campos deben estar rellenos");
    }else{
        span.setCustomValidity("");
    }
    
}


function validaPassword(){
    var nueva = document.getElementById('nueva');
    var renueva = document.getElementById('renueva');
    var antigua = document.getElementById('vieja');
    var submit = document.getElementById('boton2');

    if(nueva.value.length < 8){
        nueva.setCustomValidity("La contraseña tiene que tener como mínimo 8 carácteres");
        
    }else{
        nueva.setCustomValidity("");
    }

    if(nueva.value != renueva.value){
        renueva.setCustomValidity("Las contraseñas no coinciden");
    }else{
        renueva.setCustomValidity("");
    }

    if(nueva.value == "" || renueva.value == "" || antigua.value == ""){
        submit.setCustomValidity("Todos los campos deben completarse");
    }else{
        submit.setCustomValidity("");
    }
}