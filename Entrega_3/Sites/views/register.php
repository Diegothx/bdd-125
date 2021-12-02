<?php
// variables a usar
$username = $password  = $mail = "";
?>
<?php include('../templates/header.html');   ?>
<body>
    <div class="wrapper justify-content-center">
        <h2>Registrarse</h2>
        <form action="perfil.php" method="post">
            <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="mail" class="form-control">
            </div>    
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="username" class="form-control">
            </div>    
            <div class="form-group">
                <label>Constraseña</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>Ya tienes una cuenta? <a href="login.php">Iniciar sesion</a>.</p>
        </form>
    </div>    
</body>