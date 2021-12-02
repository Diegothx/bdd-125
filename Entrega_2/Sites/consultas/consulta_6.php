<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
 # AND pago_arriendo.fecha  > DATEADD(year, -1, GetDate()) 
# AND DATEDIFF(YEAR, visualizacion_capitulo.fecha, GETDATE()) < 1 
  $user = $_POST["user"];
  settype($user, 'string');
  $query = "WITH capitulo_serie_usuario_visto as (
          SELECT serie.id as id_serie, serie.nombre as nombre, count(visualizacion_capitulo.id_capitulo ) as veces_visto
          FROM visualizacion_capitulo, usuario, serie, capitulo
          
          WHERE visualizacion_capitulo.id_usuario = usuario.id
          AND visualizacion_capitulo.id_capitulo = capitulo.id
          and serie.id = capitulo.id_serie
          AND usuario.username ILIKE :user
          GROUP BY serie.id, serie.nombre
        )

      SELECT  nombre, veces_visto
      FROM capitulo_serie_usuario_visto
      WHERE veces_visto > 1
    
    
   ;";

  $result = $db -> prepare($query);
	$result -> execute(array(':user' => $user));
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>

      <th>Nombre</th>
      <th>Capitulos vistos</th>
      
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td>  </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
