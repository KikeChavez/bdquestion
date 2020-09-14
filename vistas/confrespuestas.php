<?php
session_start();

if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
}

include 'header.php';
include '../includes/conexion.php';
include '../includes/function.php';


//id de pregunta
$id = $_GET['id'];
//mensaje de bienvenida 
$row = bienvenida();
//Variable de session
$_SESSION['id'] = $id;
$pregunta = mostrarPregunta($id);
//mostrar respuetas
$respuestas = respuestas($id);

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
                            <a class="nav-link" href="confquestion.php">Preguntas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Respuestas</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title"> <strong>Agregue sus respuestas a "<?php echo $pregunta['pregunta']; ?>" </strong> </h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td><b>Inciso</b></td>
                                <td><b>Respuesta</b></td>
                                <td><b>Estado</b></td>
                                <td></td>
                            </tr>
                        <tbody>
                            <?php while ($row = $respuestas->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['inciso']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['respuesta']; ?>
                                    </td>
                                    <td>
                                        <?php if($row['estado']==null){echo "Incorrecto";}else{
                                            echo $row['estado'];
                                        } ?>
                                    </td>
                                    <td>
                                        <a href="../includes/deleteAns.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Agregar respuesta
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal agregar-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar una nueva respuesta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="../includes/addrespuesta.php">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Seleccione inciso</label>
                                <select class="form-control" name="inciso">
                                    <option value="a)">a)</option>
                                    <option value="b)">b)</option>
                                    <option value="c)">c)</option>
                                    <option value="d)">d)</option>
                                    <option value="e)">e)</option>
                                    <option value="f)">f)</option>
                                    <option value="g)">g)</option>
                                    <option value="h)">h)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Respuesta</label>
                                <input type="text" class="form-control" name="respuesta" placeholder="Ingrese informacón" required>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="check" value="Correcto">
                                <label class="form-check-label" for="inlineCheckbox1">Respuesta correcta</label><br>
                            </div>
                            <br><br>
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