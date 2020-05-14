<?php
    require_once 'conexionbd.php';

    $mysqli = conexion();

    function borraComent($nombre,$fecha,$hora){
        global $mysqli;

        $stmt = $mysqli->prepare("DELETE from comentarios where nombre=? and fecha='$fecha' and hora='$hora' ");
        $stmt->bind_param('s',$nombre);
        $stmt->execute();
        $stmt->close();
    }

    function getComent($nombre,$fecha,$hora){
        global $mysqli;

        $stmt = $mysqli->prepare("SELECT comentario from comentarios where nombre=? and fecha='$fecha' and hora='$hora' ");
        $stmt->bind_param('s',$nombre);
        $stmt->execute();
        $res = $stmt->get_result();
        $stmt->close();

        return $res->fetch_assoc();
    }

    function modificarComent($nombre,$fecha,$hora,$coment){
        global $mysqli;

        $nuevo = $coment .".\n" ."--Mensaje editado por el moderador--";
        $stmt = $mysqli->prepare("UPDATE comentarios set comentario=? where  nombre=? and fecha='$fecha' and hora='$hora'");
        $stmt->bind_param('ss',$nuevo,$nombre);
        if($stmt->execute()){
            $stmt->close();
            return true;
        }
        

      
    }
    function obtenid($nombre,$fecha,$hora){
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT id from comentarios where nombre=? and fecha='$fecha' and hora='$hora' ");
        $stmt->bind_param('s',$nombre);
        $stmt->execute();
        $res = $stmt->get_result();
        $stmt->close();

        return $res->fetch_assoc();

    }
?>