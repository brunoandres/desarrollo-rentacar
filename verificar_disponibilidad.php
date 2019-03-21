<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

require('archivo_busca_disponibilidad.php');

$fecha_desde = $_POST['fecha_desde'];
$fecha_hasta = $_POST['fecha_hasta'];
$hora_desde = '15:00:00';
$hora_hasta = '15:00:00';
$categoria_auto = $_POST['select_categoria'];

$hay_disponibilidad = buscarDisponibilidad($fecha_desde,$fecha_hasta,$hora_desde,$hora_hasta,$categoria_auto);

if($hay_disponibilidad>0){
    echo 1;
}else{
    echo 0;
}

?>