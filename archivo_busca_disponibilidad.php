<?php  
include("conexion_db.php");

//Archivo para contabilizar autos por categoria
include("archivo_total_autos.php");


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

	$categoria         = $pCategoria;
	$fechaDesdeReserva = $pFechaDesde;
	$fechaHastaReserva = $pFechaHasta;
	$horaDesdeReserva  = $hDesde;
	$horaHastaReserva  = $hHasta;

	$db = new Conexion();
	//Consulto todas las reservas confirmadas donde la fecha sea mayor al año corriente.
	$sql   = "SELECT * from reservas WHERE vehiculo=$categoria and estado=1 and fhasta >= '2019-01-01' ";
	$resul = $db->query($sql);

	//La disponibilidad comienza en estado False.
	$reserva = false;

	//Switch para contabilizar las cantidades de autos por categoria solicitada.
	/*switch ($categoria) {
    case 0://A
        $contador = CANTGOL+CANTCORSA+CANTCLIO+CANTONIX+CANTKWID;
        break;
    case 1://B
       $contador  = CANTLOGAN+CANTVOYAGE;
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
	}//fin switch*/

	$contador = contabilizarAutos($categoria);

	if ($contador==0) {
		exit;
	}


	//Creo una variable para ir contabilizando las veces que las fechas no coinciden y no hay disponibilidad.
	$sumaDeChoques = 0;

	if ($resul = $db->query($sql)) {
	    while ($row = $resul->fetch_assoc()) {
	         
			$reserva           = false;
			//Variable para verificar si puedo entregar un auto en el mismo dia, con un rango de horas definidio mas abajo.
			$disponibleEnEldia = false;
			
			//Traigo informacion de las reservas consultadas.
			$fechaDesdeConfirmada = $row['fdesde'];
			$fechaHastaConfirmada = $row['fhasta'];
			$horaDesdeConfirmada  = $row['hdesde'];
			$horaHastaConfirmada  = $row['hhasta'];
			$nroReserva           = $row['id_reserva'];

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


			//Seteo mi variable margen en False.
			$margen = false;

			//Calulo la diferencia de horas para ver si es posible entregar el auto en el dia.
			$horaDesdeR = date('H:i:s', strtotime($horaHastaConfirmada .'+ 1 hour'));

			if ($reserva==false and $fechaHastaConfirmada==$fechaDesdeReserva and $horaDesdeR <= $horaDesdeReserva) {			
				
				//Voy contabilizando mi contador y activo el margen, es decir hay disponbiilidad.
				$contador = $contador;
				$margen   = true;
				
			}				
			if ($reserva==false and $margen==false){
				//Descuento vehiculos a mi contador y agrego los choques a mi variable para contabilizar.	
				$contador = $contador - 1;
				$sumaDeChoques =$sumaDeChoques+1;				
			}
	   }
	}

	/************************************************ 

	IMPORTANTE : EL CONTADOR >= 1 ME DEFINE SI HAY AUTOS DISPONIBLES

	/************************************************* */

	if ($contador > 0){

		$msj	 = 'Si tiene auto';
		$reserva = true;
		//echo "SI Tenes auto <br>";
		//echo $contador;
	}else{

		$msj	 = 'falta auto';
		$reserva = false;		
	    //echo "NO Tenes auto <br>";
		//echo $contador;
	}

	//Retorno una cantidad ( numero ).
	return $contador;
	
}
//Fin funcion

//Funcion que permite evaluar si una fecha esta en un rango determinado
function check_in_range($start_date, $end_date, $date_from_user)
{
  // COnvierto a timestamp
  $start_ts = strtotime($start_date);
  $end_ts   = strtotime($end_date);
  $user_ts  = strtotime($date_from_user);

  // Controlo el rango entre start and end
  return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}

?>