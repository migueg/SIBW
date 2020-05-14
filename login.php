<?php
      require_once './vendor/autoload.php';
      require_once './scripts/usuariosbd.php';

      $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
      $twig = new Twig_Environment($loader,['debug' => true]);
      $registro = [];
     

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $user = $_POST['nick'];
          $pass = $_POST['contraseña'];
      
          if(comprobarUsuario($user,$pass)){
                session_start();
             
                $_SESSION['usuario'] = $user;
                $_SESSION['rol'] = getRol($user);
                header("Location: index.php");
                exit();
          }
   
      }
  
      echo $twig->render('login.html', $registro);
?>