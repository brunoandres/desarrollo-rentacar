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

    <title>Desarrollo Rentacar</title>
  </head>
  <body>
    <br>
    <div class="container">
      <h1>Formulario de reservas</h1>
      <form action="checkout.php" method="POST">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Fecha desde</label>
            <input type="text" name="fecha_desde" class="form-control" id="fecha_desde" autocomplete="off" placeholder="Seleccione fecha" value="">
          </div>
  
          <div class="form-group col-md-4">
            <label>Fecha hasta</label>
            <input type="text" name="fecha_hasta" class="form-control" id="fecha_hasta" autocomplete="off" placeholder="Seleccione fecha" value="">
          </div>

          <div class="form-group col-md-4">
            <label for="inputState">Categoría</label>
            <select id="inputState" class="form-control" name="select_categoria">
              <option selected>Seleccionar...</option>
              <option>Categoría A.</option>
              <option>Categoría B.</option>
              <option>Categoría C.</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" name="check_chile" value="1">
            <label class="form-check-label" for="gridCheck">
              ¿Viaja a Chile?
            </label>
          </div>
        </div>
        
        
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
    <script type="text/javascript">
      $('#fecha_desde').datepicker({
      dateFormat: "dd/mm/yy",
      autoclose : true
      });
    </script>

    <script type="text/javascript">
      $('#fecha_hasta').datepicker({
      dateFormat: "dd/mm/yy",
      autoclose : true
      });
    </script>
  </body>
</html>