<?php
session_start();

if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
}

include 'header.php';
include '../includes/conexion.php';
include '../includes/function.php';

$row = bienvenida();
$equipos = equipos();
$imagen = img();
$ruta = $imagen['ruta_img'];

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
                            <a class="nav-link active" href="#">Configuración del certamen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="confquestion.php">Preguntas</a>
                        </li>
                    </ul>
                </div>
                <div class="container">
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-5">
                            <div class="card bg-light mb-3" style="width: 30rem;">
                                <div class="card-header text-center ">
                                    Configuración del certamen
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="../includes/mod_certamen.php" enctype="multipart/form-data">
                                        <label for="exampleInputEmail1">Nombre</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-cogs"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Seleccione la imagen del certamen(Tamaño maximo 5Mb)</label>
                                            <br>
                                            <input type="file" class="form-control-file" name="img">
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <button type="submit" name="subir" class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-header text-center ">
                                    <p>Para ver la imagen actual del certamen y su respectivo nombre, da click en "Vista previa"</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                        Vista previa
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Vista previa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="form-group">
                                <label class="row justify-content-center"><strong>Nombre del certamen: <?php echo $imagen['nombre']; ?> </strong></label><br>
                            </div>
                            <div class="form-group">
                                <label class="row justify-content-center"><strong>Imagen del certamen</strong></label><br>
                                <img src="<?php echo $ruta; ?>" class="img-rounded" alt="Cinque Terre" width="304" height="236" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</body>

<?php

include 'footer.php';
?>