<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

//Archivo que contiene la funcion principal de disponibilidad
require('archivo_busca_disponibilidad.php');

//Recibo los datos principales para comprobar disponibilidad
$fecha_desde = $_POST['fecha_desde'];
$fecha_hasta = $_POST['fecha_hasta'];
$hora_desde = '15:00:00';
$hora_hasta = '15:00:00';
$categoria_auto = $_POST['select_categoria'];

$hay_disponibilidad = buscarDisponibilidad($fecha_desde,$fecha_hasta,$hora_desde,$hora_hasta,$categoria_auto);

if($hay_disponibilidad>0){
    //Resultado positivo, existe disponibilidad
    echo 1;
}else{
    //No hay disponibilidad
    echo 0;
}

?>