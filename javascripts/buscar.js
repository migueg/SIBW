function busca(){
    var input, filtro , tabla , tr, td, i , valor;
    
    input = document.getElementById("busca");
    filtro = input.value.toUpperCase();
    tabla = document.getElementById("table");
    tr = document.getElementsByTagName("tr");

    for(i=0 ; i < tr.length ; i++){
        td =  tr[i].getElementsByTagName("td")[1]; //Devuelve la celda de la etiqueta
        if(td){
            valor = td.textContent || td.innerText;
            if (valor.toUpperCase().indexOf(filtro) > -1) { //busca en el array filtro
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
        }
    }

}

function buscaEvento(){
  input = document.getElementById("busca");
  rol = document.getElementById('rol').value;
  titulo = input.value.toUpperCase();

  $.ajax({
    data: {titulo , rol},
    url: './scripts/buscar.php',
    type: 'get',
    beforeSend: function () {
      $("#mensaje").show();
    },
    success: function(respuesta) {
      procesaRespuestaAjax(respuesta);
      $("#mensaje").hide();
    }
  });
}
  function buscaEventoGestor(){
    input = document.getElementById("busca");
    rol = document.getElementById('rol').value;
    titulo = input.value.toUpperCase();
  
    $.ajax({
      data: {titulo , rol},
      url: './scripts/buscar.php',
      type: 'get',
      beforeSend: function () {
        $("#mensaje").show();
      },
      success: function(respuesta) {
        procesaRespuestaAjaxGestor(respuesta);
        $("#mensaje").hide();
      }
    });
  }


  function procesaRespuestaAjax(respuesta){
    res = "";

    for(i = 0 ; i < respuesta.length ; i++){
        res += "<tr><td>" + "<img src='"+ respuesta[i].img + "'></td><td>" + "<a href='plantillaevento.php?ev=" +
        respuesta[i].id +"'>" + respuesta[i].titulo + "</td></tr>\n";
    }
    $("#tabla > tbody").html(res);
  }

  function procesaRespuestaAjaxGestor(respuesta){
    res = "";

    for(i = 0 ; i < respuesta.length ; i++){
        res += "<tr><td>" + "<img src='"+ respuesta[i].im1 + "'></td><td>" + "<a href='plantillaevento.php?ev=" +
        respuesta[i].id +"'>" + respuesta[i].titulo + "</td></tr>\n";
    }
    $("#tabla > tbody").html(res);
  }



