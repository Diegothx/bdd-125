<?php 
    include('../templates/header.html');
    require("../config/conexion.php");
    $email_err = $password_err = $login_err = "";
    $query = "SELECT EXISTS(
        SELECT 1
        FROM usuario
        WHERE email = :email
        AND password = :clave
        );";

    if(isset($_POST['chequeo'])){
        if(empty(trim($_POST["mail"]))){
            $email_err = "Ingrese mail.";
        } else{
            $mail = trim($_POST["mail"]);
        }
        
        if(empty(trim($_POST["password"]))){
            $password_err = "Ingrese constraseña";
        } else{
            $password = trim($_POST["password"]);
        }
    
        if(empty($email_err) && empty($password_err)){
            // Prepare a select statement
            $query = "SELECT EXISTS(
                SELECT 1
                FROM usuario
                WHERE email = :mail
                AND password = :clave
                );";
            $result = $db -> prepare($query);
            $result -> execute(array(':mail' => $mail,':clave' => $password ));
            $exist = $result -> fetchAll();
            if($exist){
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["mail"] = $mail;                                         
                // Redirect user to welcome page
                header("location: perfil.php");
            }  else{
                $login_err = "Oops! Usuario no encontrado";
            }
        }
    }
    $email = $password = "";
?>
<body>
    <div class="wrapper">
        <h2>Inicio de sesion <?php echo $login_err; ?></h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label>E-mail <?php echo $email_err; ?></label>
                <input type="text" name="mail" class="form-control">
            </div>
            <div class="form-group">
                <label>Constraseña <?php echo $password_err; ?></label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Iniciar" method="POST" name="chequeo">
            </div>
            <p>No tienes una cuenta aun? <a href="register.php">Registrarse</a>.</p>
        </form>
    </div>
</body>