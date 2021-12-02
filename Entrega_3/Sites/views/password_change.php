<?php
// variables a usar
$oldpassword = 
$password = "";
?>
<?php include('../templates/header.html');   ?>
<body>
    <div class="wrapper justify-content-center">
        <h2>Cambio de clave</h2>
        <form action="perfil.php" method="post">
            <div class="form-group">
                <label>Clave actual</label>
                <input type="text" name="mail" class="form-control">
            </div>    
            <div class="form-group">
                <label>Nueva clave</label>
                <input type="text" name="username" class="form-control">
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>Te arrepentiste? <a href="perfil.php">Volver a mi perfil</a>.</p>
        </form>
    </div>    
</body>