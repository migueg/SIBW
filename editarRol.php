<?php
        require_once './vendor/autoload.php';
      
        require_once './scripts/super.php';
        include("./scripts/usuariosbd.php");
        
        $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
        $twig = new Twig_Environment($loader,['debug' => true]);
        $usuario = [];
        $mensaje = "";
        $user = "";
    
        $usuario = iniSesion();
        if($usuario['rol'] == "super"){
            if(isset($_GET['nick'])){
                $user = getUsuario($_GET['nick']);
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              $mensaje = editarRol($_POST['antiguo'],$_POST['rol'],$_POST['nick']);
            }
            echo $twig->render('editarRol.html',['usuario' => $user, 'user'=>$usuario ,'mensaje' =>$mensaje]);
        }else{
            echo "PILLADO";
        }
       
    ?>
  
    