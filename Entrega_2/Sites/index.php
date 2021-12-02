<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Amaflix </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre todos tus servicios de streaming en un mismo lugar.</p>

  <br>

  <h3 align="center">1 Todas las peliculas gratis</h3>
  
  <form align="center" action="consultas/consulta_1.php" method="post">
    
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center">2 Series con al menos X temporadas</h3>
  <form align="center" action="consultas/consulta_2.php" method="post">
    Numero de temporadas:
    <input type="text" name="n_temporadas">
    <br/>
    <br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center">3 Ingresa una pelicula o serie para ver que proovedores existen para esta</h3>

  <form align="center" action="consultas/consulta_3.php" method="post">
    Titulo:
    <input type="text" name="nombre">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center">4 Elige un genero y te entregamos todas las peliculas de ese genero y los subgeneros inmediatos</h3>

  <form align="center" action="consultas/consulta_4.php" method="post">
    <?php
  #Primero obtenemos todos los generos
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT genero FROM genero;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_4.php" method="post">
    Seleccinar un genero:
    <select name="genero">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo '<option value="'.$d[0].'">'.$d[0].'</option>';
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar por genero">
  </form>
  <br>
  <br>
  <br>


  <h3 align="center">5 Todas tus peliculas disponibles(o sea que no tienes que pagar extra por arrendar)</h3>
  <form align="center" action="consultas/consulta_5.php" method="post">
  Usuario:
    <input type="text" name="usuario">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>


  <h3 align="center">6 Series de las que has visto mas de un capitulo en el último año </h3>
  <form align="center" action="consultas/consulta_6.php" method="post">
  Usuario:
    <input type="text" name="user">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

   
  <h3 align="center">7 Dinero gastado por usuario en películas no incluidas en los planes</h3>
  <form align="center" action="consultas/consulta_7.php" method="post">
 
  <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
</body>
</html>
