function aniadirComent(x,z){
    
    var newDiv = document.createElement("div");
    newDiv.setAttribute("id","com1");
   

    var node = document.createElement("img");
    node.setAttribute("src","./img/persona.png");
    newDiv.appendChild(node);
    node = document.createElement("p");
    var texto = document.createTextNode(x);
    node.appendChild(texto);
    newDiv.appendChild(node);
    
    var node = document.createElement("img");
    node.setAttribute("src","./img/calendario.png");
    newDiv.appendChild(node);
    node = document.createElement("p");
    var fecha = new Date();
    var texto = document.createTextNode(fecha.getDate()+"/"+ fecha.getMonth() + "/"+ fecha.getFullYear());
    node.appendChild(texto);
    newDiv.appendChild(node);
    
    var div2 = document.createElement("div");
    div2.setAttribute("id","hora");
    var node = document.createElement("img");
    node.setAttribute("src","./img/hora.png");
    div2.appendChild(node);
    node = document.createElement("p");
    var fecha = new Date();
    var texto = document.createTextNode(fecha.getHours()+":"+fecha.getMinutes());
    node.appendChild(texto);
    div2.appendChild(node);
    newDiv.appendChild(div2);
    
    var div3 = document.createElement("div");
    div3.setAttribute("class","zonatext");
    node = document.createElement("p");
    texto = document.createTextNode("Comentario: ");
    node.appendChild(texto);
    div3.appendChild(node);
    node = document.createElement("p");
    texto = document.createTextNode(z);
    node.appendChild(texto);
    div3.appendChild(node);
    newDiv.appendChild(div3);

   node = document.createTextNode(" .");
   newDiv.appendChild(node);
   var elemet = document.getElementById("zonacoments");
   elemet.appendChild(newDiv);
    
   

}

function limpiarFormulario(){
    document.getElementById("myform").reset();
}
function validateForm() {
    var inpObj = document.getElementById("nombre");
    var mail = document.getElementById("mail");
    var coment = document.getElementById("comentario");
    var z = coment.value;
    var y = document.getElementById("mail").value;
    var x = document.getElementById("nombre").value;
    var avanzo1 = false;
    var avanzo2 = false;
    
    
    if (x == ""  ) {
  
        inpObj.setCustomValidity("Debes introducir un nombre");

    
    }else{
        inpObj.setCustomValidity("");
        avanzo2 = true;

    }
    
    if(y == ""){
        mail.setCustomValidity("Campo vacio") //mensaje de error
    }
    else if(mail.validity.typeMismatch){ //funcion que comprueba el email
        mail.setCustomValidity("Debes introducir una dirección de correo");
    }else{
        mail.setCustomValidity("");
        avanzo1 = true;
        console.log("H1");

    }




    if(avanzo1 == true && avanzo2 == true){
        aniadirComent(x,z);
        mandaFormulario();
        limpiarFormulario();
    }
  }

  function filtrado(respuesta){
      //var pro = mandaProhibidas();
     //console.log(respuesta[0].palabra);
  
    var temp = [];
    for(var i = 0; i < respuesta.length;i++){
        temp.push(respuesta[i].palabra);
    }
    var prohibidas = temp;
    //var prohibidas = ["puta", "cabron","gilipollas","polla","coño"]
      var x = document.getElementById("comentario");
      var texto = x.value;
      for(var i = 0; i < prohibidas.length;i++){
        regex = new RegExp("(^|\\s)"+prohibidas[i]+"($|(?=\\s))","gi") //gi explora la cadena entera
        texto = texto.replace(regex, function($0, $1){return $1 + "****"});
    }
    x.value = texto;
  }

  function mandaFormulario(){
    console.log(document.getElementById("nombre").value);

    var nombre = document.getElementById("nombre").value;
    var email = document.getElementById("mail").value;
    var comentario = document.getElementById("comentario").value;
    var id = document.getElementById("id").value;

    var ruta="nombre="+nombre+"&mail="+email+"&comentario="+comentario+"&identificador="+id;

/*
    datosFormulario = { "nombre" : document.getElementById("nombre").value,
    "email" : document.getElementById("mail").value,
    "comentario" : document.getElementById("comentario").value,
    "identificador" : document.getElementById("id").value};
    */
    $.ajax ( {
        data : ruta,
        url : './scripts/guardarform.php',
        type : 'post',
        success : function(data) {
            //alert(data.mensaje);
        }
      })
      .done(function(res) {
          alert(res);
      });
  }


  function mandaProhibidas(){
     var respuesta;
  
    $.ajax ( {
      
        url : './scripts/prohibidas.php',
        type : 'post',
        success : function(data) {
            respuesta = JSON.parse(data);
             //alert(JSON.parse(data)[0].palabra);
             //console.log(respuesta[0].palabra);
             filtrado(respuesta);
            //alert(data.mensaje);
        }
      })
      .done(function(res) {
   
        
        
         
      });

   

    return respuesta;
    
  }