<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$nombre = $_POST["nombre"];
  settype($nombre, 'string');
  
 	$query = "SELECT pelicula.id, titulo, clasificacion, puntuacion, anho, proveedor.id, proveedor.nombre, proveedor.costo
            FROM pelicula, pelicula_proveedor, proveedor
            WHERE pelicula.titulo ILIKE :nombre
            AND pelicula.id = pelicula_proveedor.id_pelicula
            AND proveedor.id = pelicula_proveedor.id_proveedor
            UNION
            SELECT pelicula.id, titulo, clasificacion, puntuacion, anho, proveedor.id, proveedor.nombre, proveedor.costo
            FROM pelicula, pelicula_arriendo, proveedor
            WHERE pelicula.titulo ILIKE :nombre
            AND pelicula.id = pelicula_arriendo.id_pelicula
            AND proveedor.id = pelicula_arriendo.id_proveedor
            UNION
            SELECT serie.id, serie.nombre, clasificacion, puntuacion, anho, proveedor.id, proveedor.nombre, proveedor.costo
            FROM serie, serie_proveedor, proveedor
            WHERE serie.nombre ILIKE :nombre
            AND serie.id = serie_proveedor.id_serie
            AND proveedor.id = serie_proveedor.id_proveedor;";
  #legacy
  /*$query = "WITH peliculas as (SELECT pelicula.pid, pelicula.titulo,  proveedor.nombre
  FROM pelicula, pelicula_proveedor, proveedor
  WHERE pelicula.titulo = '$nombre'
  AND pelicula.pid = pelicula_proveedor.id_pelicula
  AND proveedor.pid = pelicula_proveedor.id_proveedor)
  , series as (SELECT serie.pid, serie.nombre as titulo,  proveedor.nombre 
  
  FROM serie, serie_proveedor, proveedor
  WHERE serie.nombre = '$nombre'
  AND pelicula.pid = serie_proveedor.id_serie
  AND proveedor.pid = serie_proveedor.id_proveedor )
  , todos as (SELECT *
  FROM series
  union all 
  SELECT *
  FROM peliculas) 

SELECT *
FROM todos
;";
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>
*/
	$result = $db -> prepare($query);
	$result -> execute(array(':nombre' => $nombre));
	$pokemones = $result -> fetchAll();
  ?>
	
  <table>
    <tr>
      <th>ID serie/pelicula</th>
      <th>Titulo serie/pelicula</th>
      <th>Clasificacion  serie/pelicula</th>
      <th>Puntuacion serie/pelicula</th>
      <th> año serie/pelicula</th>
      <th> id_proveedor serie/pelicula</th>
      <th> nombre proveedor</th>
      <th> costo proveedor</th>
    </tr>
  <?php
	foreach ($pokemones as $p) {
    echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td><td>$p[4]</td><td>$p[5]</td><td>$p[6]</td><td>$p[7]</td><td>$p[8]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
