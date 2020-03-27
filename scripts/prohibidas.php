<?php

include('conexionbd.php');

$mysqli = conexion();

$consulta = $mysqli->prepare("SELECT * from prohibidas");
$consulta->execute();
$res = $consulta->get_result();
$prohibidas = array();

while ($fila = $res->fetch_assoc()){
    $prohibidas[] = $fila;
}
echo json_encode($prohibidas);

$consulta->close();

?>