
    <?php
        require_once './vendor/autoload.php';
        include("./scripts/conexionbd.php");
        include("./scripts/bd.php");
        $usuario = [];
        $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
        $twig = new Twig_Environment($loader,['debug' => true]);

        $mysqli = conexion();
        $eventos = getListaEv($mysqli);
        session_start();
        if(isset($_SESSION['usuario'])){
            $usuario['user'] = $_SESSION['usuario'];
            $usuario['rol']= $_SESSION['rol'];
        }
        echo $twig->render('index.html', ['eventos' => $eventos, 'user' => $usuario]);
    ?>
  
    
