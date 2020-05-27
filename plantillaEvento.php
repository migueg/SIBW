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
        
      
        $mensaje = '';

        $usuario = iniSesion();
        $mysqli = conexion();
        $evento = getEvento($idEv, $mysqli);
        $comentarios = getListaComents($idEv , $mysqli);
        $galeria = getGaleria($mysqli,$idEv);
       
      
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos['titulo'] = $evento['titulo'];
            $datos['img'] = $evento['im1'];

            publicar($mysqli,$idEv,$datos);

            $mensaje = 'publicado';
        }


        $publicado = getPublicado($mysqli, $idEv);
        if($publicado || $usuario['rol'] == 'gestor'){
            echo $twig->render('plantillaEvento.html',['mensaje' =>$mensaje,'evento' => $evento,'comentarios' => $comentarios, 'galeria' => $galeria, 'publicado' => $publicado, 'user'=>$usuario]);
        }else{
            echo $twig->render('eventoNodisponible.html',[ 'user'=>$usuario]);
        }
      
    ?>
  
    