<?php
session_start();

if (isset($_GET['errorClave'])) {
    $errorAct = $_GET['errorClave'];
}

include 'header.php';
include '../includes/function.php';

$row = bienvenida();

?>

<body style="background-color:#F8F9FA;">
    <br>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
                <div class="container">
                    <a class="navbar-brand" href="home.php"><img height="25" width="25" src="../img/icon/part1/svg/cabin.svg" /> Administrador <?php echo $row['nombre']; ?></a>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="confgame.php"><img height="20" width="20" src="../img/icon/part1/svg/backpack.svg" /> Configuracion de juego</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><img height="20" width="20" src="../img/icon/part1/svg/flag.svg" /> Historial de juegos</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><img height="20" width="20" src="../img/icon/part1/svg/pot.svg" /> Configracion de cuenta</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../includes/logout.php"><img height="20" width="20" src="../img/icon/part1/svg/panel.svg" /> Cerrar sesion</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <br>

        <?php
        if (isset($errorAct)) {

            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
            echo $errorAct;
            echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
            echo  "<span aria-hidden='true'>&times;</span>";
            echo "</button>";
            echo "</div>";
        }
        ?>

        <div class="container">
            <br>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="card bg-light mb-3" style="width: 30rem;">
                        <div class="card-header text-center ">
                            Configuración de cuenta
                        </div>
                        <div class="card-body">
                            <form method="POST" action="../includes/mod_usuario.php">
                                <label for="exampleInputEmail1">Nombre</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>" placeholder="Nombre" required>
                                </div>
                                <label for="exampleInputEmail1">Usuario</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="user" value="<?php echo $row['username']; ?>" placeholder="Nombre" required>
                                </div>
                                <label for="exampleInputEmail1">Correo electronico</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
                                    </div>
                                    <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" placeholder="Ingrese correo electronico" required>
                                </div>
                                <label for="exampleInputPassword1">Clave</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="clave1" placeholder="Clave" required>
                                </div>
                                <label for="exampleInputPassword1">Repetir clave</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="clave2" placeholder="Clave" required>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

<?php

include 'footer.php';
?>