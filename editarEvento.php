<?php
  require_once './vendor/autoload.php';
  
  include("./scripts/usuariosbd.php");
  require_once './scripts/bd.php';
  require_once './scripts/conexionbd.php';
  require_once './scripts/gestor.php';
  $mysqli = conexion();
  
  $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
  $twig = new Twig_Environment($loader,['debug' => true]);
  $usuario = [];
  $evento = [];
  $im1 = false;
  $im2 = false;
  $args = [];
  $errors = [];
 

  $mensaje = "";
  

  $usuario = iniSesion();
  
  if(isset( $_GET['ev'])){
    $evento = getEvento($_GET['ev'],$mysqli);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_FILES['imagen1']) && isset($_FILES['imagen1'])){
            if(comprobarCambio($_FILES['imagen1']['name'])){
                $im1 =true;
                $args['im1'] = $_FILES['imagen1']['name'];
                $args['c1'] = true;
            }else{
               $args['im1'] = $_POST['antigua1'];
               $args['c1'] = false;
            }
            if(comprobarCambio($_FILES['imagen2']['name'])){
                $im2 =true;
                $args['im2'] = $_FILES['imagen2']['name'];
                $args['c2'] = true;

            }else{
              $args['im2'] = $_POST['antigua2'];
              $args['c2'] = false;
            }

            $e = array();
            if($im1 && $im2){
              
              $e = guardaImagen($_FILES['imagen1']);
              if(sizeof($e)>0){
                  $errors['e1'] = $e;
              }

              $e = guardaImagen($_FILES['imagen2']);
              if(sizeof($e)>0){
                  $errors['e2'] = $e;
              }

            }else if($im1){
              $e = guardaImagen($_FILES['imagen1']);
              if(sizeof($e)>0){
                  $errors['e1'] = $e;
              }
            }else if($im2){
              $e = guardaImagen($_FILES['imagen2']);
              if(sizeof($e)>0){
                  $errors['e2'] = $e;
              }
            }


        }

        if($_FILES['archivo']){
          guardaEngaleria($_FILES['archivo'],$_GET['ev']);
      
        }

        $args['titulo'] = $_POST['titulo'];
        $args['organizador'] = $_POST['organizador'];
        $args['fecha'] = $_POST['fecha'];
        $args['t1'] = $_POST['titulo1'];
        $args['t2'] = $_POST['titulo2'];
        $args['d1'] = $_POST['des1'];
        $args['d2'] = $_POST['des2'];
        $args['web'] = $_POST['web'];
        $args['org'] = $_POST['webOrg'];
        $args['twit'] = $_POST['twit'];
        $args['face'] = $_POST['face'];
        $args['etq'] = $_POST['etq'];
        $args['id'] = $_GET['ev'];

        if(sizeof($e) == 0 ){

          if(editarEvento($args)){
            $mensaje="EVENTO EDITADO CON ÉXITO";
          }else{
            $mensaje= "ERROR AL EDITAR";
          }
         
        }
    }

  }
 
  echo $twig->render('editarEvento.html',['user'=>$usuario,'evento'=>$evento,'msg'=>$mensaje]);
    
?>