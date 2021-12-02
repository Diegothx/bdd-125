<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $n_temporadas = (int)$_POST["n_temporadas"];

 	$query = "WITH serie_temporada as (
            SELECT serie.id, serie.nombre , MAX(capitulo.numero_temporada) as n_temporadas_serie
            FROM serie, capitulo 
            where serie.id = capitulo.id_serie  
            GROUP BY serie.id, serie.nombre)
            SELECT *
            FROM serie_temporada
            WHERE serie_temporada.n_temporadas_serie >= $n_temporadas
            
            ;";
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Temporadas</th>
     
    </tr>
  <?php
	foreach ($pokemones as $pokemon) {
  		echo "<tr><td>$pokemon[0]</td><td>$pokemon[1]</td><td>$pokemon[2]</td>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
