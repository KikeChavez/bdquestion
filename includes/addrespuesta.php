<?php
session_start();

include '../includes/function.php';

$respuesta = $_POST['respuesta'];
//$id_pregunta = $_POST['preg'];
$inciso = $_POST['inciso'];
//id de la pregunta
$id = $_SESSION['id'];
$check = $_POST['check'];


if(addrespuesta($id, $inciso, $respuesta, $check)==1){
    $mensaje="Respuesta registrada exitosamente";
    header("Location: ../vistas/confrespuestas.php?mensaje=".urlencode($mensaje)."&id=".urlencode($id));

}else if(addrespuesta($id, $inciso, $respuesta, $check)==2){
    $mensaje="¡Error! La respuesta ya existe";
    header("Location: ../vistas/confrespuestas.php?mensaje=".urlencode($mensaje)."&id=".urlencode($id));

}else if(addrespuesta($id, $inciso, $respuesta, $check)==3){
    $mensaje="¡Error! El inciso ya existe";
    header("Location: ../vistas/confrespuestas.php?mensaje=".urlencode($mensaje)."&id=".urlencode($id));
}else{
    $mensaje="Error al registrar la respuesta";
    header("Location: ../vistas/confrespuestas.php?mensaje=".urlencode($mensaje)."&id=".urlencode($id));
}

?>