<?php
 
require('../includes/function.php');
require('../includes/conexion.php');

$user = $_POST['username'];
$pass = $_POST['password'];
$radio = $_POST['select'];

if($user==""){
    //echo "No hay sesion";
    header("Location: ../index.php");
}else{

    if($radio == "configurar"){
        //echo "Configurando";
        if(userExist($user, $pass)==true){
            header("Location: ../vistas/home.php");
        }
        else{
            $errorRad = "Usuario o contraseña incorrecta";
            header("Location: ../index.php?errorRad=".urlencode($errorRad));
        }

    }else if($radio == "jugar"){
        header("Location: ../vistas/juego/game.php");
    }else{
        $errorRad = "Seleccione una opción de sesión";
        header("Location: ../index.php?errorRad=".urlencode($errorRad));
    }

}

?>