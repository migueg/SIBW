<?php
  require_once './vendor/autoload.php';
  
  include("./scripts/usuariosbd.php");
  require_once './scripts/gestor.php';
  require_once './scripts/bd.php';
  
  $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
  $twig = new Twig_Environment($loader,['debug' => true]);
  $usuario = [];
 

  $mensaje = "";
  

  $usuario = iniSesion();
  $mysqli = conexion();

 
  if(isset( $_GET['ev'])){
    $publicado = getPublicado($mysqli,$_GET['ev']);
    if(borraEvento($_GET['ev'] , $publicado)){
        $mensaje = "Evento eliminado con éxito";
    }else{
        $mensaje = "Error al eliminar el evento";
    }

  }
 
  echo $twig->render('borrarEvento.html',['user'=>$usuario,'msg'=>$mensaje]);
    
?>