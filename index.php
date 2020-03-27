
    <?php
        require_once './vendor/autoload.php';
        include("./scripts/conexionbd.php");
        include("./scripts/bd.php");

        $loader = new Twig_Loader_Filesystem('./directoriotemplates') ;
        $twig = new Twig_Environment($loader,['debug' => true]);

        $mysqli = conexion();
        $eventos = getListaEv($mysqli);
        echo $twig->render('index.html', ['eventos' => $eventos]);
    ?>
  
    
