<?php
require_once 'conexionbd.php';
$mysqli = conexion();

function comprobarUsuario($user, $pass){
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT pass FROM usuarios where nick=?");
    $stmt->bind_param('s',$user);
    $stmt->execute();
    $consulta = $stmt->get_result();
    $contraseña = $consulta->fetch_assoc();
    $stmt->close();
    $c = (string)$pass;
    if(password_verify($c ,$contraseña['pass'])){
        return true;
    }else{
        return false;
    }
}

function generaHash($pass){
    return password_hash($pass, PASSWORD_DEFAULT);
}

function getRol($user){
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT rol FROM usuarios where nick=? ");
    $stmt->bind_param('s',$user);
    $stmt->execute();
    $consulta = $stmt->get_result();
    $rolassoc = $consulta->fetch_assoc();
    $rol = $rolassoc['rol'];
    $stmt->close();

    return $rol;
}

function iniSesion(){
    $usuario = [];

    session_start();
    if(isset($_SESSION['usuario'])){
        $usuario['usuario'] = $_SESSION['usuario'];
        $usuario['rol'] = $_SESSION['rol'];
    }

    return $usuario;
}

function modificarSesion($nick){
    if(isset($_SESSION['usuario'])){
        $_SESSION['usuario'] =$nick;
    }
}
function getDatos($user){
    global $mysqli;
    
    $stmt = $mysqli->prepare("SELECT nick,mail,nombre,apellidos,nacimiento from usuarios where nick=? ");
    $stmt->bind_param('s',$user);
    $stmt->execute();
    $consulta = $stmt->get_result();
    $datos = $consulta->fetch_assoc();

    return $datos;
    
}

function modificardatosUsuario($original,$user,$mail,$nombre,$apellidos,$fecha){
    global $mysqli;

    $stmt = $mysqli->prepare("UPDATE usuarios set nick=?, mail=?, nombre=?, apellidos=? , nacimiento=? where nick=? ");
    $stmt->bind_param('ssssss',$user,$mail,$nombre,$apellidos,$fecha,$original);
   if( !$stmt->execute()){
       return false;
   }else{
       $stmt->close();
       return true;
   }

}

function modificarPassword($antigua,$nueva , $user){
    global $mysqli;
    $existe = comprobarUsuario($antigua,$user);
    

    if($existe){
        
       

        $hash = generaHash($nueva);
        $stmt = $mysqli->prepare("UPDATE usuarios set pass='$hash' where nick=? ");
        $stmt->bind_param('s',$user);
        
        if($stmt->execute()){
            $stmt->close();
          
            return true;
        }else{
            $stmt->close();
            return false;
        }

    }else{
        return false;
    }
}

?>