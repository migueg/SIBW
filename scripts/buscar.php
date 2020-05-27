<?php
    require_once 'conexionbd.php';

    function getEventosAllUsers($titulo){
        $mysqli = conexion();
     
        $stmt = $mysqli->prepare("SELECT * from  listaeventos 
        where (titulo) LIKE ('%$titulo%') ");
       // $stmt->bind_param('s',$titulo);
        $stmt->execute();
        $res = $stmt->get_result();
        
        $eventos = array();

        while ($fila = $res->fetch_assoc()){
            $eventos[] = $fila;
        }
    
        return $eventos;
     

    }

    function getEventosGestor($titulo){
        $mysqli = conexion();
     
        $stmt = $mysqli->prepare("SELECT id,titulo,im1 from  evento 
        where (titulo) LIKE ('%$titulo%') ");
       // $stmt->bind_param('s',$titulo);
        $stmt->execute();
        $res = $stmt->get_result();
        
        $eventos = array();

        while ($fila = $res->fetch_assoc()){
            $eventos[] = $fila;
        }
    
        return $eventos;
    }


    
    header('Content-Type: application/json');

    $titulo = $_GET['titulo'];
  
    if($_GET['rol'] != 'gestor'){
        
        $datos = getEventosAllUsers($titulo);
    }else{
        $datos = getEventosGestor($titulo);
    }
  
    echo(json_encode($datos));
   

?>