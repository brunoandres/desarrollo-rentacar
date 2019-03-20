<?php
class Conexion{

     static function conectar_MySql_server(){
  
      $servidor = 'mysql.hostinger.com.ar';
      $base_de_datos ='u756079281_alqui';
      $usuario = 'u756079281_bruno';
      $clave = 'cenergon';
  
      $conexion = new mysqli($servidor,$usuario,$clave,$base_de_datos);
      mysqli_set_charset($conexion,'utf8');
      if ($conexion->connect_error) {
  
        die('Error en la conexion : '.$conexion->connect_errno.'-'.$conexion->connect_error);
  
      }
      return $conexion;
    }
  }
  
?>
