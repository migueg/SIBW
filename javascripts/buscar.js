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