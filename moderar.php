<?php
      require_once './vendor/autoload.php';
      require_once './scripts/usuariosbd.php';
      require_once './scripts/moderador.php';

      $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
      $twig = new Twig_Environment($loader,['debug' => true]);
      $usuario = [];
      $coment=[];
      $id = [];
      $usuario = iniSesion();
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(isset($_GET['nombre'])){
            if(modificarComent($_GET['nombre'],$_GET['fecha'],$_GET['hora'],$_POST['coment'])){
                $id = obtenid($_GET['nombre'],$_GET['fecha'],$_GET['hora']);
                echo $twig->render('moderar.html', ['user'=>$usuario, 'coment'=>$coment , 'id'=>$id['id']]);
            }
          }
          
      }
      if(isset($_GET['opcion'])){
        if($_GET['opcion'] == 1){
            $usuario['opcion'] ="borrar";
            borraComent($_GET['nombre'],$_GET['fecha'],$_GET['hora']);
            $id = $_GET['id'];
            header("Location: plantillaevento.php?ev=$id");
        }

        if($_GET['opcion'] = 2){
            $coment = getComent($_GET['nombre'],$_GET['fecha'],$_GET['hora']);
            $coment['fecha'] = $_GET['fecha'];
            $coment['nomcoment'] = $_GET['nombre'];
            $coment['hora'] = $_GET['hora'];

            echo $twig->render('moderar.html', ['user'=>$usuario, 'coment'=>$coment]);
        } 
      }
  
   
?>