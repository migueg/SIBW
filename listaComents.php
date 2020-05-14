<?php
        require_once './vendor/autoload.php';
        include("./scripts/conexionbd.php");
        include("./scripts/bd.php");
        include("./scripts/usuariosbd.php");
        
        $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
        $twig = new Twig_Environment($loader,['debug' => true]);
        $usuario = [];


    
        $usuario = iniSesion();
        if($usuario['rol'] == "moderador"){
            $mysqli = conexion();
            $comentarios = getAllComents($mysqli);
            echo $twig->render('listaComents.html',['comentarios' => $comentarios, 'user'=>$usuario]);
        }else{
            echo "PILLADO";
        }
       
    ?>
  
    