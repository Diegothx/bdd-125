<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $user = $_POST["usuario"];
  settype($user, 'string');

  
  $query = "WITH subscripcion_activa as ( 
              SELECT *
              FROM subscripcion
              WHERE subscripcion.id NOT IN  (SELECT subscripcion_cancelada.id  FROM subscripcion_cancelada)
                  )
 
      SELECT pelicula.titulo , proveedor.nombre
      FROM usuario, proveedor, subscripcion_activa, pelicula, pelicula_proveedor
      WHERE usuario.id = subscripcion_activa.id_usuario
      AND proveedor.id =subscripcion_activa.id_proveedor
      AND pelicula.id = pelicula_proveedor.id_pelicula
      AND subscripcion_activa.id_proveedor = pelicula_proveedor.id_proveedor
      AND usuario.username ILIKE :user
          
  
  ;";



  $result = $db -> prepare($query);
	$result -> execute(array(':user' => $user));
  $dataCollected = $result -> fetchAll();
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
