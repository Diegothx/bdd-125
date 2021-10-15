<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $n_temporadas = $_POST["n_temporadas"];

 	$query = "SELECT serie.id, serie.nombre , count(capitulo.titulo) as n_temporadas_serie
            FROM serie, capitulo 
            where serie.id = capitulo.serie_id  
            GROUP BY serie.id ;";
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
