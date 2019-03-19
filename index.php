<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Link datepicker bootstrap -->
    <link rel="stylesheet" href="datepicker/css/datepicker.css">

    <!-- link datepicker jquery --> 

    <link rel="stylesheet" href="datepicker-jquery/jquery-ui.css">
    <!--<link rel="stylesheet" href="/resources/demos/style.css">-->

    <!-- bootstrap toggle switch -->
    <link href="bootstrap-toggle/css/bootstrap-toggle.min.css" rel="stylesheet">

    <title>Desarrollo Rentacar</title>
  </head>
  <body>
    <br>
    <div class="container">
      <div id="errores"></div>
      <h1>Formulario de reservas</h1>
      <form id="formdata" method="POST">
        <div class="form-row">
          <div class="form-group col-md-4">
            <span class="badge badge-success">Fecha desde</span>
            <input type="text" name="fecha_desde" class="form-control" id="fecha_desde" autocomplete="off" placeholder="Seleccione fecha" value="" readonly>
          </div>
  
          <div class="form-group col-md-4">
            <span class="badge badge-success">Fecha hasta</span>
            <input type="text" name="fecha_hasta" class="form-control" id="fecha_hasta" autocomplete="off" placeholder="Seleccione fecha" value="" readonly>
          </div>

          <div class="form-group col-md-4">
            <span class="badge badge-success">Categoría</span>
            <select id="inputState" class="form-control" name="select_categoria">
              <option selected>Seleccionar...</option>
              <option>Categoría A.</option>
              <option>Categoría B.</option>
              <option>Categoría C.</option>
            </select>
          </div>       
        </div>
        <div class="form-row">
          
        </div>

        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input fantasma" type="checkbox" id="check_chile" name="check_chile" value="1">
            <label class="form-check-label" for="gridCheck">
              ¿Viaja a Chile?
            </label>
          </div>
        </div>  

        <div class="form-group col-md-4">
          <label class="form-check-label" for="gridCheck">
            Cantidad de PAX
          </label>
          <input class="form-control" type="number" id="cant_pax" name="cant_pax" min="1" value="1">
        </div>

        <div class="form-group">
          <div class="form-check">
            
            
          </div>
        </div>  

        <div id="activaChile" style="display: none"><!-- div que activa opciones de chile-->
          <div class="form-group col-md-4">
            <span class="badge badge-success">Paso Fronterizo</span>
            <select id="inputState" class="form-control" name="select_paso">
              <option selected>Seleccionar...</option>
              <option value="Paso Samoré (Osorno)">Paso Samoré (Osorno)</option>
              <option value="Paso Mamuil Malal (Junín de los Andes)">Paso Mamuil Malal (Junín de los Andes)</option>              
              <option value="Paso Mamuil Malal (Junín de los Andes)">Paso Mamuil Malal (Junín de los Andes)</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <span class="badge badge-success">Fecha desde</span>
            <input type="text" name="fecha_desde_chile" class="form-control" id="fecha_desde_chile" autocomplete="off" placeholder="Seleccione fecha" value="">
          </div>

          <div class="form-group col-md-4">
            <span class="badge badge-success">Fecha hasta</span>
            <input type="text" name="fecha_hasta_chile" class="form-control" id="fecha_hasta_chile" autocomplete="off" placeholder="Seleccione fecha" value="">
          </div>
        </div><!-- div que activa opciones de chile-->

        <button type="button" id="botonenviar" class="btn btn-primary btn-xs">Buscar disponibilidad...</button>
      </form>

    </div>

    <!--Activo formulario para completar reserva -->
    <div id="exito" style="display:none">
      <div class="container mt-5">
        <form action="checkout.php" method="POST">
          <div class="form-group col-md-4">
            <label>Nombre y Apellido</label>
            <input type="text" name="fecha_hasta" class="form-control" id="" autocomplete="off" placeholder="Ingrese Nombre" value="">
          </div>

          <div class="form-group col-md-4">
            <label>Nro de Vuelo</label>
            <input type="text" name="fecha_hasta" class="form-control" id="" autocomplete="off" placeholder="Ingrese Nombre" value="">
          </div>

          <button type="submit" id="botonenviar" class="btn btn-success btn-xs">Continuar...</button>
        </form>

        
      </div>
    </div>

    <!--Activo mensaje de no disponibilidad -->
    <div id="fracaso" style="display:none">
      Sólo se reserva hasta 5 PAX!.
    </div>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- datepicker bootstrap -->
    <script src="datepicker/js/bootstrap-datepicker.js"></script>

    <!-- -->

    <!-- datepicker jquery-->

    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="datepicker-jquery/jquery-ui.js"></script>

    <!-- -->


    <!-- bootstrap toggle switch -->

    <script src="bootstrap-toggle/js/bootstrap-toggle.min.js"></script>

    <script type="text/javascript" src="js/fechas.js"></script>
    <script type="text/javascript">
      $(function () {
        $("#check_chile").click(function () {
            if ($(this).is(":checked")) {
                $("#activaChile").show();
            } else {
                $("#activaChile").hide();
            }
        });
    });
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
      function validaForm(){
      //Compruebo que la fecha inicial para Chile no sea menor a la fecha inicial de la reserva en general.
      var fecha_inicial_reserva = $("#fecha_desde").val();
      var fecha_final_reserva = $("#fecha_hasta").val();
      var fecha_final_chile = $("#fecha_hasta_chile").val();

      //Valido que la fecha inicial a Chile no sea mayor a la fecha final a Chile.
      if($("#fecha_desde").val() > $("#fecha_hasta").val()){
        alert("La fecha inicial de la reserva no puede ser mayor a la fecha final, debe ser antes del "+fecha_final_reserva);
        $("#fecha_desde").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
      }

      //Compruebo si el check de chile esta activado
      if ($("#check_chile").is(":checked")) {

        //Valido que la fecha inicial a Chile no sea antes de la fecha inicial de la reserva.
        if( $("#fecha_desde_chile").val() < $("#fecha_desde").val() ){
          alert("Fecha inicial no comprendida en el rango de la reserva (1), debe ser mayor a "+fecha_inicial_reserva);
          $("#fecha_desde_chile").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
          return false;
        }
        //Valido que la fecha inicial a Chile no sea despues de la fecha final de la reserva.
        if( $("#fecha_desde_chile").val() > $("#fecha_hasta").val() ){
          alert("Fecha inicial no comprendida en el rango de la reserva (2), debe ser antes del "+fecha_final_reserva);
          $("#fecha_desde_chile").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
          return false;
        }
        //Valido que la fecha final para Chile no sea menor a la fecha inicial de la reserva.
        if( $("#fecha_hasta_chile").val() < $("#fecha_desde").val() ){
          alert("Fecha final no comprendida en el rango de la reserva, debe ser mayor a "+fecha_inicial_reserva);
          $("#fecha_hasta_chile").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
          return false;
        }
        //Valido que la fecha final para Chile no sea mayor a la fecha final de la reserva.
        if($("#fecha_hasta_chile").val() > $("#fecha_hasta").val()){
          alert("Fecha final no comprendida en el rango de la reserva, debe ser antes del "+fecha_final_reserva);
          $("#fecha_hasta_chile").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
          return false;
        }


        // Campos de texto
        if($("#fecha_desde_chile").val() == ""){
            //alert("Seleccione fecha inicial.");
            $("#fecha_desde_chile").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
            return false;
        }
    
        if($("#fecha_hasta_chile").val() == ""){
            //alert("Seleccione fecha final.");
            $("#fecha_hasta_chile").focus();
            return false;
        }
      }
      // Campos de texto
      if($("#fecha_desde").val() == ""){
          //alert("Seleccione fecha inicial.");
          $("#fecha_desde").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
          return false;
      }
  
      if($("#fecha_hasta").val() == ""){
          //alert("Seleccione fecha final.");
          $("#fecha_hasta").focus();
          return false;
      }/*
      if($("#inputState").val() == "Seleccionar..."){
          alert("Selecciona una categoria.");
          $("#inputState").focus();
          return false;
      }*/
      return true; // Si todo está correcto
      }
    </script>

    <script type="text/javascript">
      $(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
          $("#botonenviar").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
              if(validaForm()){                               // Primero validará el formulario.
                  $.post("enviar.php",$("#formdata").serialize(),function(res){
                      $("#formulario").fadeOut("slow");   // Hacemos desaparecer el div "formulario" con un efecto fadeOut lento.
                      if(res == 1){
                          $("#exito").delay(50).fadeIn("slow");
                          $("#fecha_desde").val("");
                          $("#fecha_hasta").val("");
                          // Si hemos tenido éxito, hacemos aparecer el div "exito" con un efecto fadeIn lento tras un delay de 0,5 segundos.
                      } else {
                          $("#fracaso").delay(50).fadeIn("slow");    // Si no, lo mismo, pero haremos aparecer el div "fracaso"
                      }
                  });
              }
          });    
      });
    </script>
    
  </body>
</html>