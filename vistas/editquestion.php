<?php
session_start();

if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
}

include 'header.php';
include '../includes/conexion.php';
include '../includes/function.php';

$id = $_GET['id'];
$row = bienvenida();
$show = mostrarPregunta($id);
$_SESSION['id_pregunta'] = $id;

?>

<body style="background-color:#F8F9FA;">
    <br>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
                <div class="container">
                    <a class="navbar-brand" href="home.php"><img height="25" width="25" src="../img/icon/part1/svg/cabin.svg" /> Administrador <?php echo $row['nombre']; ?></a>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><img height="20" width="20" src="../img/icon/part1/svg/backpack.svg" /> Configuracion de juego</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><img height="20" width="20" src="../img/icon/part1/svg/flag.svg" /> Historial de juegos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="home.php"><img height="20" width="20" src="../img/icon/part1/svg/pot.svg" /> Configracion de cuenta</a>
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
        if (isset($mensaje)) {

            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
            echo $mensaje;
            echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
            echo  "<span aria-hidden='true'>&times;</span>";
            echo "</button>";
            echo "</div>";
        }
        ?>



        <div class="container">
            <br>
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="confgame.php">Equipos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="confquestion.php">Preguntas</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title"> <strong>Editar pregunta " <?php echo $show['pregunta']; ?> "</strong></h5>
                    <br>
                    <div class="container">
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-5">
                                <div class="card bg-light mb-3" style="width: 30rem;">
                                    <div class="card-header text-center ">
                                        Edita la pregunta
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="../includes/mod_pregunta.php">
                                            <div class="form-group">
                                                <br>
                                                <label for="exampleInputEmail1">Pregunta:</label>
                                                <input type="text" class="form-control" name="prg" value="<?php echo $show['pregunta']; ?>" placeholder="Nombre" required>
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
            </div>
            <br>
        </div>
</body>

<?php

include 'footer.php';
?>