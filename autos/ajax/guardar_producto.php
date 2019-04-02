<?php
	if (empty($_POST['marca'])){
		$errors[] = "Ingrese la marca del Auto.";
	} elseif (!empty($_POST['marca'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $categoria = mysqli_real_escape_string($con,(strip_tags($_POST["categoria"],ENT_QUOTES)));
	$marca = mysqli_real_escape_string($con,(strip_tags($_POST["marca"],ENT_QUOTES)));
	$modelo = mysqli_real_escape_string($con,(strip_tags($_POST["modelo"],ENT_QUOTES)));
	$patente = mysqli_real_escape_string($con,(strip_tags($_POST["patente"],ENT_QUOTES)));
	$habilitado = mysqli_real_escape_string($con,(strip_tags($_POST["habilitado"],ENT_QUOTES)));
	$viaja_chile = mysqli_real_escape_string($con,(strip_tags($_POST["viaja_chile"],ENT_QUOTES)));
	

	// REGISTER data into database
    $sql = "INSERT INTO autos(id_categoria, marca, modelo, patente, habilitado, viaja_chile) VALUES ($categoria,'$marca','$modelo','$patente',$habilitado,$viaja_chile)";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "El auto ha sido guardado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>			