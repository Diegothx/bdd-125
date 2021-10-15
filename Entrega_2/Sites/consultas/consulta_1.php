<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


  #Se construye la consulta como un string
 	$query = "SELECT DISTINCT pelicula.id, titulo, duracion, clasificacion, puntuacion, anho, proveedor.id, proveedor.nombre, proveedor.costo
            FROM pelicula, proveedor, pelicula_proveedor
            WHERE pelicula_proveedor.id_proveedor = proveedor.id
            AND pelicula_proveedor.id_pelicula = pelicula.id;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Id_pelicula</th>
      <th>Titulo</th>
      <th>Duracion</th>
      <th>clasificacion</th>
      <th>puntuacion</th>
      <th>anho</th>
      <th>Id_proveedor</th>
      <th>nombre proveedor</th>
      <th>costo proveedor</th>
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($pokemones as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td><td>$p[4]</td><td>$p[5]</td><td>$p[6]</td><td>$p[7]</td><td>$p[8]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>
