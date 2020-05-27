<?php
        require_once './vendor/autoload.php';
      
        require_once './scripts/super.php';
        include("./scripts/usuariosbd.php");
        
        $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
        $twig = new Twig_Environment($loader,['debug' => true]);
        $usuario = [];


    
        $usuario = iniSesion();

        
        echo $twig->render('busqueda.html',[ 'user'=>$usuario]);
      
    ?>
  
    