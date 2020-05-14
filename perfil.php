<?php

require_once './vendor/autoload.php';
require_once './scripts/conexionbd.php';
include("./scripts/usuariosbd.php");

$loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
$twig = new Twig_Environment($loader,['debug' => true]);
$usuario = [];
$existe['existe']= true;

$usuario = iniSesion();
$user =  $usuario['usuario'];
$datos = getDatos($user);

$nickOriginal =  $usuario['usuario'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['nick'])){
        $nick = $_POST['nick'];
        $mail = $_POST['mail'];
        $nombre = $_POST['name'];
        $apellidos = $_POST['apellidos'];
        $fecha = $_POST['fecha'];
        $result = modificardatosUsuario($nickOriginal,$nick,$mail,$nombre,$apellidos,$fecha);
        if($result){
            $datos = getDatos($nick);
            modificarSesion($nick);
            $usuario['usuario'] = $nick;
        }else{
            $existe['existe'] = false;
        }
      

    }else if(isset($_POST['lastpass'])){
        $antigua = $_POST['lastpass'];
        $nueva = $_POST['pass'];
      
        $exito = modificarPassword($antigua,$nueva,$user);
     
        if(!$exito){
            $existe['contraseña'] = true;
            
        }else{
            $existe['exito'] = true;
        }
    }
   
    
    
}





echo $twig->render('perfil.html',['user' => $usuario , 'datos' => $datos , 'existe' => $existe]);
?>







