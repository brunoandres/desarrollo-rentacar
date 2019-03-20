<?php
/**
 *
 */
class Conexion extends mysqli
{
  private $h='mysql.hostinger.com.ar';
  private $u='u756079281_bruno';
  private $p='cenergon';
  private $db='u756079281_alqui';
  public function __construct()
  {
    parent:: __construct($this->h,$this->u,$this->p,$this->db);
    $this->set_charset('utf-8');
    $this->connect_errno ? die('Error en la conexion'.mysqli_connect_errno()): $m= "Conexion exitosa";
    
  }
}

?>