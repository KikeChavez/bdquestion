<?php

include 'function.php';

$id = $_GET['id']; 

if(deleteQuestion($id)==true){
    $mensaje="Pregunta borrada con exito";
    header("Location: ../vistas/confquestion.php?mensaje=".urlencode($mensaje));
}else{
    header("Location: ../vistas/confquestion.php?mensaje=".urlencode($mensaje));
    $mensaje="Error al borrar pregunta";
}


?>