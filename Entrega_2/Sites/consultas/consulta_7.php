<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


  #Se construye la consulta como un string
  
 	$query = "SELECT  usuario.id ,usuario.username, SUM(pelicula_arriendo.precio) as precio
            FROM pago_arriendo, pelicula_arriendo, usuario 
            WHERE pago_arriendo.id_pelicula = pelicula_arriendo.id_pelicula 
            AND  pago_arriendo.id_usuario = usuario.id 
            AND pago_arriendo.fecha  > DATEADD(year, -1, GetDate()) 
            GROUP BY usuario.id, usuario.username
            ORDER BY precio desc ;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

<table>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Gastado</th>
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($pokemones as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>