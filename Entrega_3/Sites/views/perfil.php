<?php 
    include('../templates/header.html');
    require("../config/conexion.php");
    $query = "SELECT EXISTS(
        SELECT 1
        FROM usuario
        WHERE email = :email
        AND password = :password
        );";
	$result = $db -> prepare($query);
	$result -> execute(array(':email' => $email,':password' => $password));
	$pefil = $result -> fetchAll();
  ?>
?>

<body>
    <div class="container">
        <div class="row">
            <h2>Mi perfil</h2>
        </div>
        <div class="row">
            <div class="col">
                <h3>Datos personales:  <?php echo "$pefil" ?></h3>
                <h5>Nombre:</h5>
                <h5>emai:</h5>
                <h5>usuario:</h5>
                <h5>horas gastadas: </h5>
                <h6><a href="password_change.php">Cambiar Constraseña</a>.</h6>
            </div>
            <div class="col">
                <h3>Subscripciones:</h3>
                <?php
                    // echo $pokemones;
                    foreach ($subscripciones as $sub) {
                    echo "<h5>$sub</h5>";
                }
                ?>
            </div>
        </div>
    </div>
<?php include('../templates/footer.html');   ?>