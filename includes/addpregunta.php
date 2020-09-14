<?php

include '../includes/function.php';

$question = $_POST['pregunta'];

if(addpregunta($question)==2){
    $mensaje="Pregunta registrada exitosamente";
    header("Location: ../vistas/confquestion.php?mensaje=".urlencode($mensaje));

}else if(addpregunta($question)==1){
    $mensaje="¡Error! La pregunta ya existe";
    header("Location: ../vistas/confquestion.php?mensaje=".urlencode($mensaje));

}else{
    $mensaje="Error al registrar la pregunta";
    header("Location: ../vistas/confquestion.php?mensaje=".urlencode($mensaje));
}

?>