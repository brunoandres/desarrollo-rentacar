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
      <h1>Formulario de reservas</h1>
      <form action="checkout.php" method="POST">
        <div class="form-row">
          <div class="form-group col-md-4">
            <span class="badge badge-success">Fecha desde</span>
            <input type="text" name="fecha_desde" class="form-control" id="fecha_desde" autocomplete="off" placeholder="Seleccione fecha" value="">
          </div>
  
          <div class="form-group col-md-4">
            <span class="badge badge-success">Fecha hasta</span>
            <input type="text" name="fecha_hasta" class="form-control" id="fecha_hasta" autocomplete="off" placeholder="Seleccione fecha" value="">
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

        <button type="submit" class="btn btn-primary btn-lg">Siguiente</button>
      </form>

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
  </body>
</html>