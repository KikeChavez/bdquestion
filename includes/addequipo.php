<?php

include '../includes/function.php';

$nombre = $_POST['nombre'];
$inte = $_POST['integrantes'];
$band = 1;

if(addequipo($nombre,$inte)==2){
    $mensaje="Equipo registrado exitosamente";
    header("Location: ../vistas/confgame.php?mensaje=".urlencode($mensaje));

}else if(addequipo($nombre,$inte)==$band){
    $mensaje="¡Error! El equipo ya existe";
    header("Location: ../vistas/confgame.php?mensaje=".urlencode($mensaje));

}else{
    $mensaje="Error al registrar usuario";
    header("Location: ../vistas/confgame.php?mensaje=".urlencode($mensaje));
}

?>