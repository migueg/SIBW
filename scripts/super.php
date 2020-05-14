<?php
require_once 'conexionbd.php';

$mysqli = conexion();

function getUsuarios(){
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT nick, rol , nombre , apellidos from usuarios");
    $stmt->execute();

    $res = $stmt->get_result();
    $usuarios = array();
    
    while($fila = $res->fetch_assoc()){
        $usuarios[] = $fila;
    }

    return $usuarios;
}

function getUsuario($nick){
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT nick, rol , nombre , apellidos from usuarios where nick= ?");
    $stmt->bind_param('s',$nick);
    $stmt->execute();

    $res = $stmt->get_result();

    return $res->fetch_assoc();
}

function compruebaSuper(){
    //comprueba el número de super usuarios
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * from usuarios where rol='super'");
    $stmt->execute();

    $res = $stmt->get_result();

    $num =$res->num_rows;

    return $num;

  
}
function editarRol($antiguo,$nuevo, $nick){
    global $mysqli;
    $mensaje = "";
    $stmt = $mysqli->prepare("UPDATE usuarios set rol='$nuevo' where nick='$nick'" );

    if($antiguo == "super"){
        $numSuper = compruebaSuper();
        if($numSuper == 1){
            $mensaje="No se puede cambiar el rol, solo hay un superUsuario en el sistema";
        }else{
            
          if($stmt->execute()){
            $stmt->close();
            $mensaje = "Rol modificado con éxito";
          }else{
            $mensaje = "Error al modificar el rol";
          }
         
        }

    }else{

        if($stmt->execute()){
            $stmt->close();
            $mensaje = "Rol modificado con éxito";
          }else{
            $mensaje = "Error al modificar el rol";
          }
         
    }

    return $mensaje;
}
?>