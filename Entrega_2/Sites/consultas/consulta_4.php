<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var = $_POST["genero"];
  print($var);
  $query = "SELECT pelicula.id, titulo, clasificacion, puntuacion, anho
  FROM pelicula, pelicula_genero
  WHERE pelicula.id = pelicula_genero.id_pelicula 
  AND pelicula_genero.genero = 'Ciencia ficción apocalíptica'
  UNION
  SELECT pelicula.id, titulo, clasificacion, puntuacion, anho
  FROM pelicula, pelicula_genero, genero_subgenero
  WHERE pelicula.id = pelicula_genero.id_pelicula 
  AND pelicula_genero.genero = genero_subgenero.nombre_subgenero
  AND genero_subgenero.genero = 'Ciencia ficción apocalíptica';";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
  <table>
    <tr>
      <th>ID</th>
      <th>Titulo</th>
      <th>Clasificacion</th>
      <th>Puntuacion</th>
      <th>Año</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td><td>$p[4]</tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
