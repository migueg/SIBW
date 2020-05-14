<?php
    function conexion(){
        $mysqli = new mysqli("localhost", "administrador", "admin2020", "sibw"); //admin2020
        if ($mysqli->connect_errno) {
           exit('Fallo al conectar a la BD');
          }

          return $mysqli;
    }

    
?>