<?php  
include("conexion_db.php");
//Defino la cantidad de autos por categoria
#CATEGORIA A
define("CANTGOL", 3);
define("CANTCORSA", 2);
define("CANTCLIO", 1);
define("CANTONIX", 1);
define("CANTKWID", 1);
#CATEGORIA B
define("CANTVOYAGE", 4);
define("CANTLOGAN", 6);
#CATEGORIA C
define("CANTSURAN", 3);
define("CANTCRONOS", 1);
#CATEGORIA D
define("CANTSPIN", 2);
#CATEGORIA E
define("CANTH1", 1);
#CATEGORIA F unica
define("CANTSONIC", 1);

function buscarDisponibilidad($pFechaDesde,$pFechaHasta,$hDesde,$hHasta,$pCategoria){

	$categoria=$pCategoria;
	$fechaDesdeReserva = $pFechaDesde;
	$fechaHastaReserva = $pFechaHasta;
	$horaDesdeReserva = $hDesde;
	$horaHastaReserva = $hHasta;

	$db = new Conexion();
	$sql="SELECT * from reservas WHERE vehiculo=$categoria and estado=1 and fhasta >= '2019-01-01' ";
	//$sql="SELECT * from reservas WHERE estado = 1 and vehiculo=$categoria and fdesde between '$fechaDesdeReserva' and '$fechaHastaReserva'";
	$resul = $db->query($sql);

	//RESERVA COMIENZA EN FALSE
	$reserva= false;

	switch ($categoria) {
    case 0://A
        $contador = CANTGOL+CANTCORSA+CANTCLIO+CANTONIX+CANTKWID;
        break;
    case 1://B
       $contador = CANTLOGAN+CANTVOYAGE;
        break;
    case 2://C
        $contador = CANTSURAN+CANTCRONOS;
        break;
    case 3://D
    	$contador = CANTSPIN;
    	break;
    case 4://E
    	$contador = CANTH1;
    	break;
    case 5://F
    	$contador = CANTSONIC;
    	break;
	}//fin switch

	//Recorro las reservas evaluando disponibilidad
	//FUNCIONANDO 30-06-2017
	/*echo "Cantidad de autos".$contador.'<br>';
	echo "Reserva solicitada<br>";
	echo $fechaDesdeReserva.'<br>';
	echo $fechaHastaReserva.'<br>';*/
	$sumaDeChoques =0;

	if ($resul = $db->query($sql)) {
	//$contador = $contador +1;    //fetch associative array 
	    while ($row = $resul->fetch_assoc()) {
	        
	        
			$reserva= false;
			$disponibleEnEldia = false;
	        
	        $fechaDesdeConfirmada=$row['fdesde'];
			$fechaHastaConfirmada=$row['fhasta'];

			$horaDesdeConfirmada = $row['hdesde'];
			$horaHastaConfirmada = $row['hhasta'];

			$nroReserva=$row['id_reserva'];

	       ///Primero evaluo contra las fechas de reservas confirmadas
			//Evaluo que NO este en el rango la fecha
			if (!check_in_range($fechaDesdeReserva, $fechaHastaReserva, $fechaDesdeConfirmada)) {
				if (!check_in_range($fechaDesdeReserva, $fechaHastaReserva, $fechaHastaConfirmada))
					if (!check_in_range($fechaDesdeConfirmada, $fechaHastaConfirmada, $fechaDesdeReserva))
						if (!check_in_range($fechaDesdeConfirmada, $fechaHastaConfirmada, $fechaHastaReserva))
							$reserva= true;
					else $reserva = false;
				else $reserva = false;				
			} else $reserva= false;		

			$margen = false;

			//MARGEN HORARIO
			$horaDesdeR = date('H:i:s', strtotime($horaHastaConfirmada .'+ 1 hour'));

			if ($reserva==false and $fechaHastaConfirmada==$fechaDesdeReserva and $horaDesdeR <= $horaDesdeReserva) {			
				
				$contador = $contador;
				$margen = true;
				
			}				
			if ($reserva==false and $margen==false){	
				$contador = $contador - 1;
				$sumaDeChoques =$sumaDeChoques+1;
				
			}

	   }
	}

	//El contador define si tengo auto disponible

	if ($contador > 0){
		$reserva= true;
		$msj= 'Si tiene auto';
		//echo "SI Tenes auto <br>";
		//echo $contador;
	}else{
		$reserva=false;
		$msj='falta auto';
	    //echo "NO Tenes auto <br>";
		//echo $contador;
	}

	//echo $contador=$msj.$reserva;

	return $contador;
	//echo $contador;
}//fin de la funcion buscarDisponibilidad



//Funcion que permite evaluar si una fecha esta en un rango determinado
function check_in_range($start_date, $end_date, $date_from_user)
{
  // COnvierto a timestamp
  $start_ts = strtotime($start_date);
  $end_ts = strtotime($end_date);
  $user_ts = strtotime($date_from_user);

  // Controlo el rango entre start and end
  return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}

echo $hay_disponibilidad = buscarDisponibilidad('2019-10-10','2019-10-20','15:00:00','15:00:00',0);

?>