<?php

if (isset($_GET['errorRad'])) {
    $errorLogin = $_GET['errorRad'];
} else {
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/css/all.css">

</head>

<!-- Nuestro css-->
<link rel="stylesheet" type="text/css" href="css/index.css">

<body class="login">
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="img/user.png" th:src="@{img/user.png}" />
                </div>

                <form action="includes/login.php" method="POST" class="col-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Usuario" name="username" required />
                    </div>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" required />
                    </div>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-success">
                            <input type="radio" name="select" autocomplete="off" value="configurar"> Configurar
                        </label>
                        <label class="btn btn-outline-success">
                            <input type="radio" name="select" autocomplete="off" value="jugar"> Jugar
                        </label>
                        <br>
                    </div>
                    <br>
                    <div class="form-group">
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Ingresar </button>
                    </div>
                </form>

                <div class="col-12 forgot">
                    <!-- <a href="#">¿Olvido su clave?</a> -->
                </div>
                <?php
                if (isset($errorLogin)) {
                ?>
                    <div th:if="" class="alert alert-danger" role="alert">
                        <?php echo $errorLogin; ?>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="font/js/all.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>