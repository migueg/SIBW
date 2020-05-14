<?php
        require_once './vendor/autoload.php';
        include("./scripts/conexionbd.php");
        include("./scripts/bd.php");
        include("./scripts/usuariosbd.php");
        
        $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
        $twig = new Twig_Environment($loader,['debug' => true]);
        $usuario = [];

        if(isset($_GET['ev'])){
            $idEv = $_GET['ev'];
            
        }else{
            $idEv = -1;
        }
    
        $usuario = iniSesion();
        $mysqli = conexion();
        $evento = getEvento($idEv, $mysqli);
        $comentarios = getListaComents($idEv , $mysqli);
        $galeria = getGaleria($mysqli,$idEv);
        echo $twig->render('plantillaEvento.html',['evento' => $evento,'comentarios' => $comentarios, 'galeria' => $galeria , 'user'=>$usuario]);
    ?>
  
    