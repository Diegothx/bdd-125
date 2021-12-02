<?php include('../templates/header.html');   ?>
<body>
    <div class="wrapper">
        <h2>Inicio de sesion</h2>
        <form action="perfil.php" method="post">
            <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="mail" class="form-control">
            </div>
            <div class="form-group">
                <label>Constraseña</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>No tienes una cuenta aun? <a href="register.php">Registrarse</a>.</p>
        </form>
    </div>
</body>