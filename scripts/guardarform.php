<?php
     

    require_once 'conexionbd.php';
    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
      }
   
    console_log("ESTOY EN PHP");
    if(isset($_POST['nombre'])){
        $mysqli = conexion();

        $nombre = $_POST['nombre'];
        echo(json_encode(["mensaje"=> $nombre]));

        $correo = $_POST["mail"];
        $comentario = $_POST['comentario'];
        $arrayfecha = getdate();

        if($arrayfecha["mon"]< 10){
            $mes= "0".$arrayfecha["mon"];
        }else{
            $mes = $arrayfecha["mon"];
        }
        $fecha = $arrayfecha["year"] . "/" .$mes. "/" . $arrayfecha["mday"];
        $hora = $arrayfecha["hours"] . ":" . $arrayfecha["minutes"];
        
        echo "Nombre: " .$nombre. " ";
        echo "Comentario: ".$comentario. " ";
        echo "Correo : ".$correo. " ";

        $id = $_POST['identificador'];
        $id = intval($id);
        echo "id :".$id;

        //Sentencia preparada
        $stmt = $mysqli->prepare("INSERT INTO comentarios (nombre, fecha, hora, comentario, mail, id) values 
        (?, '$fecha','$hora'  , '$comentario', '$correo', ? )");
        $stmt->bind_param("si",$nombre, $id); //Sustituye los parametros por la ? solo si son string o int
        $stmt->execute();
        $stmt->close();


        /*
        $consulta = $mysqli->query("INSERT INTO comentarios (nombre, fecha, hora, comentario, mail, id) values 
        ('$nombre', '$fecha', '$hora' , '$comentario', '$correo', $id )");
        
        if($consulta === TRUE){
            echo "INSERTADO";
        }else{
            echo "ERROR";
        }
        */
    }else{
        echo("ERROR FATAL");
    }

    //header("Location: plantillaEventophp");
?>