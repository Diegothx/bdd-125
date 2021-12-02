<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


  #Se construye la consulta como un string 
 
  
 	$query = "WITH  usuario_gasta AS (
              SELECT  usuario.id , usuario.username, SUM(pelicula_arriendo.precio) as precio
              FROM pago_arriendo, pelicula_arriendo, usuario 
              WHERE pago_arriendo.id_pelicula = pelicula_arriendo.id_pelicula 
              AND  pago_arriendo.id_usuario = usuario.id 
              
              GROUP BY usuario.id, usuario.username
              ORDER BY precio desc

            ), usuario_no_gasta AS ( 
              SELECT usuario.id, usuario.username
              FROM  usuario
              WHERE usuario.id 
              NOT IN (SELECT pago_arriendo.id_usuario FROM pago_arriendo)
              GROUP BY usuario.id, usuario.username
              
            )
            
            SELECT  *
            FROM usuario_gasta
          
           

             ;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

<table>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Dinero Gastado</th>
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($pokemones as $p) {
          echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> </tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>