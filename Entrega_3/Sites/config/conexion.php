<?php
  try {
    $user = 'grupo94';
    $password = '322sonanbulos192';
    $databaseName = 'grupo94e3';
    $db = new PDO("pgsql:dbname=$databaseName;host=localhost;port=22;user=$user;password=$password");
    $user2 = 'grupo125';
    $password2 = 'grupo125';
    $databaseName2 = 'grupo125e3';
    $db2 = new PDO("pgsql:dbname=$databaseName2;host=localhost;port=22;user=$user2;password=$password2");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>