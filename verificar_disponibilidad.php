<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("conexion_db.php");
require('archivo_busca_disponibilidad.php');

$pFechaDesde = $_POST['fecha_desde'];
$pFechaHasta = $_POST['fecha_hasta'];
$hDesde = '15:00:00';
$hHasta = '15:00:00';
$pCategoria = 0;

$hay_disponibilidad = buscarDisponibilidad($pFechaDesde,$pFechaHasta,$hDesde,$hHasta,$pCategoria);

if($hay_disponibilidad){
    echo 1;
}else{
    echo 0;
}

?>