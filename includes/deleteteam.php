<?php

include 'function.php';

$id = $_GET['id']; 

if(deleteteam($id)==true){
    $mensaje="Equipo borrado con exito";
    header("Location: ../vistas/confgame.php?mensaje=".urlencode($mensaje));
}else{
    header("Location: ../vistas/confgame.php?mensaje=".urlencode($mensaje));
    $mensaje="Error al borrar equipo";
}


?>