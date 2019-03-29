<?php 

//Funcion para devolver la cantidad de autos por categoria
function contabilizarAutos($categoria){

    $db     = new Conexion();
    $sql    = "select * from autos where id_categoria = $categoria";
    $total  = mysqli_num_rows(mysqli_query($db,$sql));
    return $total;

}

?>