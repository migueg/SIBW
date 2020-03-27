
/*
 $("#btnEnviar").click(function(ev){
        console.log("HOLA");
        ev.preventDefault();
        
        var id = getQueryVariable('ev');
        console.log(id);
       
        var formulario = {
            "nombre": document.getElementById("nombre").value,
            "mail": $("#myform").mail.value,
            "comentario": $("#myform").comentarios.value,
            "identificador" : id
        }
        
        var formulario = $(this).serializeArray();
        var formData = new FormData($("#myform"));
       // var identificador = {"identificador" : id};
        console.log(HOLA);
        $.ajax({
            type: "POST",
            url: "./scripts/guardarform.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,  
            
            success: function(data){
                alert('ENVIADO');
            },
            error: function(data){
                alert('ERROR');
            }.done(function(){
                alert("HOLA");
            })
        });
        
       
    });



function getQueryVariable(variable) { //funcion para obtener el id del evento
    var query = window.location.search.substring(1);
    var vars = query.split("?");
    for (var i=0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if(pair[0] == variable) {
            return pair[1];
        }
    }
    return false;
}
*/