<?php
    require_once './scripts/usuariosbd.php';
    require_once './vendor/autoload.php';
    require_once './scripts/conexionbd.php';
    

    $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
    $twig = new Twig_Environment($loader,['debug' => true]);
    $registro = [];
  

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = $_POST['nick'];
        $passnoHash = $_POST['contraseña'];
        $mail = $_POST['mail'];
        $name = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $fecha = $_POST['fecha'];
        
        $pass = generaHash($passnoHash);
        $rol = "registrado";
        
        $mysqli = conexion();
        
        if(!($stmt = $mysqli->prepare("INSERT INTO usuarios (nick,pass,mail,rol,nombre,apellidos,nacimiento) values
        (?,?,?,'$rol',?,?,$fecha)"))){
            echo "Error";
        }
         
        $stmt->bind_param("sssss",$user, $pass,$mail,$name,$apellidos);
        if(!$stmt->execute()){
           $registro['fallo']= true;
        }else{
            
            $stmt->close();
            header("Location: login.php");
            
            exit();
        }
        
       
 
    }
    
    echo $twig->render('registrar.html', ['registro'=>$registro]);
   // echo generaHash($pass);
?>