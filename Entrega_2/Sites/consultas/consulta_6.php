<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var = $_POST["genero"];
  $query = "WITH subscripcion_activa_1 as (select * 
        FROM subscripcion, subscripcion_cancelada
        WHERE subscripcion.fecha_inicio  <= subscripcion_cancelada.fecha_termino
        AND subscripcion.id = subscripcio_cancelada.id_subscripcion)
   
   , subscripcion_activa_2 as (SELECT DISTINCT *
        FROM subscripcion 
        WHERE subscripcion.id 
        NOT IN (SELECT id_subscripcion  FROM subscripcion_cancelada)
        , subscripcion_activa as(SELECT *
        FROM subscripcion_activa_1
        UNION
        SELECT *
        FROM subscripcion_activa_2)
        ,

   
   SELECT pelicula.titulo , proveedor.nombre
   FROM usuario, proveedor, subscripcion_activa, pelicula, pelicula_proveedor
    WHERE usuario.id = subscripcion_activa.id_usuario
    AND proveedor.id =subscripcion_activa.id_proveedor
    AND pelicula.id = pelicula_proveedor.id_pelicula
    AND subscripcion_activa.id_proveedor = pelicula_proveedor.id_proveedor
   ;";

  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>

      <th>Titulo</th>
      <th>Proveedor</th>
      
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td>  </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
