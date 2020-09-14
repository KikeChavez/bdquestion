<?php 
	include '../includes/function.php';
	
	$name=$_POST['nombre'];
	$usuario=$_POST['user'];
	$email=$_POST['email'];
	$clave1=$_POST['clave1'];
	$clave2=$_POST['clave2'];

	if($clave1 == $clave2){
		$pass = md5($clave1);

		if(userUpdate($name, $usuario, $pass, $email)==true){
		   $Msg = "¡Usuario actualizado con exito!";
		   header("Location: ../vistas/home.php?errorClave=".urlencode($Msg));
		}else{
			$Msg = "¡Error al actualizar usuario!";
			header("Location: ../vistas/home.php?errorClave=".urlencode($Msg));
		}	

	}else{
		$errorClave = "Las claves no coinciden";
		header("Location: ../vistas/home.php?errorClave=".urlencode($errorClave));
	}
	
?>
