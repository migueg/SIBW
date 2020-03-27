<?php
        require_once './vendor/autoload.php';
        include("./scripts/conexionbd.php");
        include("./scripts/bd.php");
        $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
        $twig = new Twig_Environment($loader,['debug' => true]);

        if(isset($_GET['ev'])){
            $idEv = $_GET['ev'];
        }else{
            $idEv = -1;
        }

        $mysqli = conexion();
        $evento = getEvento($idEv, $mysqli);
        $comentarios = getListaComents($idEv , $mysqli);
        $galeria = getGaleria($mysqli,$idEv);
        echo $twig->render('plantillaEvento.html',['evento' => $evento,'comentarios' => $comentarios, 'galeria' => $galeria]);
    ?>
  
    