<?php 
function getEvento($idEv, $mysqli){
    //$consulta = $mysqli->query("SELECT * FROM evento where id=" .$idEv);
    $stmt = $mysqli->prepare("SELECT * FROM evento where id= ?");
    $stmt->bind_param("i",$idEv);
    $stmt->execute();
    $consulta = $stmt->get_result();

    $evento = array([]);
    $row = array();
    if($consulta->num_rows > 0){
        $row = $consulta->fetch_assoc();

        $evento = array('id'=>$row['id'],'titulo' => $row['titulo'], 'organizador' => $row['organizador'],
        'fecha' => $row['fecha'], 'im1' => $row['im1'], 'im2' => $row['im2'], 'textoim1' => $row['textoim1'],'textoim2' => $row['textoim2'],
        'desc1' =>$row['descripcion1'], 'desc2' =>$row['descripcion2'], 'web' =>$row['enlaceweb'], 'organizadorweb'=>$row['enlaceorganizador'] ,
        'twitter' =>$row['enlaceTwitter'], 'Face' =>$row['enlaceFace']);
    }

    if(!$row) exit('DETECCIÓN DE INYECCIÓN');
    return $evento;
    $stmt->close();
}


function getListaEv($mysqli){
    $consulta = $mysqli->query("SELECT * FROM listaeventos");
    

    $lista = array();
    while($fila = $consulta->fetch_assoc()){
        $lista[] = $fila;
    }
    return $lista;
}

function getListaComents(  $idEv , $mysqli){
    $stmt = $mysqli->prepare("SELECT * FROM comentarios where id=? ORDER BY fecha, hora ASC");
    $stmt->bind_param("i",$idEv);
    $stmt->execute();
    $consulta = $stmt->get_result();
    //$consulta = $mysqli->query("SELECT * FROM comentarios where id=$idEv ORDER BY fecha, hora ASC");
    
    $com = array();

    while ($fila = $consulta->fetch_assoc()){
        $com[] = $fila;
    }
    if(!$com) exit('DETECCIÓN DE INYECCIÓN');

    //$coments = array_reverse($com);
    return $com;
    $stmt->close();

}

function getGaleria($mysqli, $idEv){
    $stmt = $mysqli->prepare("SELECT * FROM galeria where id=? ");
    $stmt->bind_param("i",$idEv);
    $stmt->execute();
    $consulta = $stmt->get_result();
    $galeria = array();

    while ($fila = $consulta->fetch_assoc()){
        $galeria[] = $fila;
    }

    return $galeria;

    $stmt->close();
}
?>