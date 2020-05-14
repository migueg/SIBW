<?php

require_once 'conexionbd.php';

$mysqli = conexion();
$ruta = "./img/eventos/";

function guardaImagen($files){
    global $ruta;
    $errors= array();
    $file_name = $files['name'];
    $file_size = $files['size'];
    $file_tmp = $files['tmp_name'];
    $file_type = $files['type'];

    $tmp = explode('.',$files['name']);
    $file_ext = strtolower(end($tmp));
  
    $extensions= array("jpeg","jpg","png");
    
    if (in_array($file_ext,$extensions) === false){
      $errors[] = "Extensión no permitida, elige una imagen JPEG o PNG.";
     
    }
    
    if ($file_size > 2097152){
      $errors[] = 'Tamaño del fichero demasiado grande';
    }
    
    if (empty($errors)==true) {
      move_uploaded_file($file_tmp, $ruta . $file_name);
   
        
    }

    return $errors;
}

function getIdEv(){
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT id from evento order by evento.id ASC ");
    $stmt->execute();
    $res = $stmt->get_result();
    $ant = 0;
    $stmt->close();
    while ($id =  $res->fetch_assoc()){
        
        if($ant < $id['id']){
            $ant =  $id['id'];
        }

        
    }
    return $ant + 1;
}

function addEvento($args){
    global $mysqli;
    global $ruta;

    $img1 = $ruta.$args['img1'];
    $img2 = $ruta.$args['img2'];
    $fecha =  $args['fecha'];
    $id = getIdEv();

    $stmt =  $mysqli->prepare("INSERT INTO evento (id, titulo, 
    organizador, fecha, im1, im2, textoim1
    , textoim2, descripcion1, descripcion2, enlaceweb,
     enlaceorganizador, enlaceTwitter, enlaceFace, etiquetas) VALUES
    ($id, ?, ?,'$fecha', '$img1', '$img2', ?, ?,?,?,?,?,?,?,?)");

    $stmt->bind_param('sssssssssss',$args['titulo'], $args['organizador']
    , $args['t1'], $args['t2'], $args['d1'],  $args['d2'], $args['web']
    ,   $args['org'],  $args['twit'] ,  $args['face'] ,  $args['etq']);

    if(!$stmt->execute()){
        exit("Error");
    }else{
        $stmt = $mysqli->prepare("INSERT INTO listaeventos(id,titulo,ruta,img) VALUES 
        ($id,?,'plantillaEvento.php', '$img1')" );
        
        $stmt->bind_param('s',$args['titulo']);

        if(!$stmt->execute()){
            exit("Error2");
        }

        $stmt->close();
    }
}
function borraImagenes($id){
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT im1 , im2 from evento where id=$id");
    $stmt->execute();
    $res = $stmt->get_result();
    $img = $res->fetch_assoc();

    unlink($img['im1']); //borro las imagenes 
    unlink($img['im2']);
}
function borraEvento($id){
    global $mysqli;

    borraImagenes($id);
    $stmt = $mysqli->prepare("DELETE FROM listaeventos where id=$id");
    $stmt->execute();
    $stmt = $mysqli->prepare("DELETE FROM evento where id=$id");
    if(!$stmt->execute()){
        
        return false;
    }else{
        $stmt->close();
        return true;
    }

}

function comprobarCambio($img){
    global $ruta;

    if($ruta == $ruta.$img){
        return false;
    }else{
        return true;
    }
}


function editarEvento($args){
    global $mysqli;
    global $ruta;
    $fecha = $args['fecha'];
    $id= $args['id'];

    if($args['c1']){
        $imagen1 = $ruta.$args['im1'];
    }else{
        $imagen1 = $args['im1'];
    }

    if($args['c2']){
        $imagen2 = $ruta.$args['im2'];
    }else{
        $imagen2 = $args['im2'];

    }
    
    $stmt = $mysqli->prepare("UPDATE evento set titulo=? ,organizador=? ,fecha='$fecha',
    im1='$imagen1', im2='$imagen2' , textoim1 =?, textoim2=?,
    descripcion1=?, descripcion2 = ?, enlaceweb=?, enlaceorganizador=? , enlaceTwitter=?,
    enlaceFace=? , etiquetas=? where id=?");
 
    $stmt->bind_param('sssssssssssi',$args['titulo'],$args['organizador'],$args['t1'],
    $args['t2'],$args['d1'], $args['d2'],$args['web'],$args['org'],  $args['twit'],$args['face'],
    $args['etq'],$id);

    if($stmt->execute()){
        $stmt->close();
        return true;
    }else{
        return false;
    }




}

function guardaEngaleria($row, $id){
    $errors=[];
    $rutas = [];
    $cantidad = count($row['tmp_name']);
    for($i=0 ; $i<$cantidad ; $i++){
       
            $filename = $row["name"][$i];
            $tmp = $row["tmp_name"][$i];

            $destino = "./img/galeria/";

            if(!file_exists($destino)){
                mkdir($destino,0777) or die("No se puede crear");

            }

            $destino = $destino.$filename;
            $aux = explode('.',$row['name'][$i]);
            $file_ext = strtolower(end($aux));
          
            $extensions= array("jpeg","jpg","png");
            
            if (in_array($file_ext,$extensions) === false){
              $errors[] = "Extensión no permitida, elige una imagen JPEG o PNG.";
             
            }
            
          
            
            if (empty($errors)==true) {
              move_uploaded_file($tmp, $destino);
                $ruta['ruta'][$i] = $destino;
                
            }

        
            
            
    }
    global $mysqli;
    
    for($a=0 ; $a<$cantidad ; $a++){
        $r =   $ruta['ruta'][$a];
        
        $stmt = $mysqli->prepare("INSERT INTO galeria (ruta ,id) values 
        ('$r' , ?)");

        $stmt->bind_param('i',$id);
        $stmt->execute();
    }

    $stmt->close();
        
}


function getAllEventos(){
    global $mysqli;
    $ev = array();
    $stmt = $mysqli->prepare("SELECT id,titulo,etiquetas from evento order by id ASC ");
    $stmt->execute();
    $res = $stmt->get_result();

    while($fila = $res->fetch_assoc()){
        $ev[] = $fila;
    }

    return $ev;
}
?>