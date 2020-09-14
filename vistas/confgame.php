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
          if(isset($mensaje)){

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
                            <a class="nav-link active" href="#">Equipos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="confcertamen.php">Configuración del certamen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="confquestion.php">Preguntas</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title"> <strong>Equipos activos</strong> </h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td><b>Nombre de equipo</b></td>
                                <td><b>Integrantes</b></td>
                                <td></td>
                            </tr>
                        <tbody>
                            <?php while ($row = $equipos->fetch_assoc()) { ?> 
                                <tr>
                                    <td><?php echo $row['nombre']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['integrantes']; ?>
                                    </td>
                                    <td>
                                        <a href="../includes/deleteteam.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Agregar equipo
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal agregar-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo equipo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="../includes/addequipo.php">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre de equipo</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Numero de integrantes</label>
                                <input type="text" class="form-control" name="integrantes" placeholder="Numero de integrantes" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

<?php

include 'footer.php';
?>