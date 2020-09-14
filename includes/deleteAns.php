<?php
session_start();

include 'function.php';

$id_respuesta = $_GET['id'];
$idd = $_SESSION['id'];

if(deleteAns($id_respuesta)==true){
    $mensaje="Respuesta borrada con exito";
    header("Location: ../vistas/confrespuestas.php?mensaje=".urlencode($mensaje)."&id=".urlencode($idd));
}else{
    header("Location: ../vistas/confrespuestas.php?mensaje=".urlencode($mensaje)."&id=".urlencode($idd));
    $mensaje="Error al borrar respuesta";
}


?>