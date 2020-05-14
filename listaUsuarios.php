<?php
        require_once './vendor/autoload.php';
      
        require_once './scripts/super.php';
        include("./scripts/usuariosbd.php");
        
        $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
        $twig = new Twig_Environment($loader,['debug' => true]);
        $usuario = [];


    
        $usuario = iniSesion();
        if($usuario['rol'] == "super"){
         
            $usuarios = getUsuarios();
            echo $twig->render('listaUsuarios.html',['usuarios' => $usuarios, 'user'=>$usuario]);
        }else{
            echo "PILLADO";
        }
       
    ?>
  
    