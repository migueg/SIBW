function comprobar(){
    var select = document.getElementById('rol').value;
    var submit = document.getElementById('boton');
    var antiguo = document.getElementById('antiguo').value;

    if(select == ""){
        submit.setCustomValidity("Elige un nuevo rol");
    }else if(select == antiguo){
        submit.setCustomValidity("El antiguo y el eligido son iguales");
    }else{
        submit.setCustomValidity("");
        alert('Vas a modificar el rol')
    }

    
}