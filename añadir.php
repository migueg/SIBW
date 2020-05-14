<?php
        require_once './vendor/autoload.php';
  
        include("./scripts/usuariosbd.php");
        require_once './scripts/gestor.php';
        
        $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
        $twig = new Twig_Environment($loader,['debug' => true]);
        $usuario = [];
        $errors = [];
        $args = [];
        $mensaje ="";
        $e = array();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_FILES['imagen1'])){
               
                if($_FILES['imagen1']['name']){
                    $e = guardaImagen($_FILES['imagen1']);
                    if(sizeof($e)>0){
                        $errors['e1'] = $e;
                    }
                }
            }
            if(isset($_FILES['imagen1'])){
              
                if($_FILES['imagen2']['name']){
                    $e = guardaImagen($_FILES['imagen2']);
                    if(sizeof($e)>0){
                        $errors['e2'] = $e;
                    }
                }
               
            }

            if(isset($_FILES['imagen1']) && isset($_FILES['imagen1'])){
                $args['titulo'] = $_POST['titulo'];
                $args['organizador'] = $_POST['organizador'];
                $args['fecha'] = $_POST['fecha'];
                $args['img1'] = $_FILES['imagen1']['name'];
                $args['img2'] = $_FILES['imagen2']['name'];
                $args['t1'] = $_POST['titulo1'];
                $args['t2'] = $_POST['titulo2'];
                $args['d1'] = $_POST['des1'];
                $args['d2'] = $_POST['des2'];
                $args['web'] = $_POST['web'];
                $args['org'] = $_POST['webOrg'];
                $args['twit'] = $_POST['twit'];
                $args['face'] = $_POST['face'];
                $args['etq'] = $_POST['etq'];

                if(sizeof($e) == 0){
                    addEvento($args);
                    $mensaje = "AÑADIDO CON EXITO";
                }
               



              
            }
        }

        
    
        $usuario = iniSesion();
       
        echo $twig->render('añadir.html',['user'=>$usuario, 'errores'=>$errors, 'msg'=>$mensaje]);
?>
  
    