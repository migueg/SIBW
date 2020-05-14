<?php
        require_once './vendor/autoload.php';
      
        require_once './scripts/gestor.php';
        include("./scripts/usuariosbd.php");
        
        $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
        $twig = new Twig_Environment($loader,['debug' => true]);
        $usuario = [];


    
        $usuario = iniSesion();
        if($usuario['rol'] == "gestor"){
         
            $eventos = getAllEventos();
            echo $twig->render('listaEventos.html',['eventos' => $eventos, 'user'=>$usuario]);
        }else{
            echo "PILLADO";
        }
       
    ?>
  
    