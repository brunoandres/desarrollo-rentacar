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
      <h1>Confirmación</h1>
      <form action="checkout.php" method="POST">
        <div class="form-row">
          <div class="form-group col-md-4">
            <span class="badge badge-success">Fecha desde</span>
            <label><?php if (isset($_POST['fecha_desde'])) {
              echo $_POST['fecha_desde'];
            }else{
              echo "NO POST";
            } ?></label>
          </div>
  
          <div class="form-group col-md-4">
            <span class="badge badge-success">Fecha hasta</span>
            <label><?php if (isset($_POST['fecha_hasta'])) {
              echo $_POST['fecha_hasta'];
            }else{
              echo "NO post";
            }  ?></label>
          </div>

          <div class="form-group col-md-4">
            <span class="badge badge-success">Categoría</span>
            <label><?php echo $_POST['select_categoria']; ?></label>
          </div>

          <div class="form-group col-md-4">
            <label>Viaja a Chile</label>
            <?php if (!empty($_POST['check_chile'])) {
              echo "<strong>Si</strong>";
            } else {
              echo "<strong>No</strong>";
            }
             ?>
            <label></label>
          </div>
        </div>

        <?php if ((isset($_POST['check_chile']) and $_POST['check_chile'])==1): ?>
        <div class="form-group col-md-4">
          <label>Nombre y Apellido</label>
          <input type="text" name="fecha_hasta" class="form-control" id="" autocomplete="off" placeholder="Ingrese Nombre" value="">
        </div>

        <div class="form-group col-md-4">
          <span class="badge badge-success">Paso Fronterizo</span>
          <input type="text" name="fecha_hasta" class="form-control" id="" autocomplete="off" value="<?php echo $_POST['select_paso']; ?>" readonly="">
        </div>

        
        <?php endif ?>
        
        <button type="submit" class="btn btn-primary btn-lg">Siguiente</button>
        <a href="index.php"><button type="button" class="btn btn-warning btn-lg">Cancelar</button></a>
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