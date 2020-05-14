function openNav() {
    document.getElementById("mySidebar").style.width = "30%";
    document.getElementById("main").style.marginLeft = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }

//Document es un puntero a la página web

 function deleteComent(url){
  
   if(!confirm("AVISO!!!,vas a realizar un borrado, ¿Estas seguro?")){
     return false;
   }else{
     document.location=url;
     return true;
   }
  
   
  }


  function comprobarComent(){
    var coment = document.getElementById('comentario').value;
    var antiguo = document.getElementById('antiguo').value;
    console.log(antiguo);
    var submit = document.getElementById('boton');
    if(antiguo == coment){
      submit.setCustomValidity("No has modificado nada");
    }else{
      submit.setCustomValidity("");
    }
  }