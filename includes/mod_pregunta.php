<?php 
    session_start();
	include '../includes/function.php';
	
	$prg=$_POST['prg'];
	$id = $_SESSION['id_pregunta'];

	if(questionUpdate($id, $prg)==2){
		$Msg = "¡Error! La pregunta ya existe";
		header("Location: ../vistas/editquestion.php?mensaje=".urlencode($Msg)."&id=".urlencode($id));
	}else if(questionUpdate($id, $prg)==true){
		$Msg = "La pregunta se actualizo con exito";
		header("Location: ../vistas/confquestion.php?mensaje=".urlencode($Msg)."&id=".urlencode($id));
	}else{
		$Msg = "Error al actualizar pregunta";
		header("Location: ../vistas/editquestion.php?mensaje=".urlencode($Msg)."&id=".urlencode($id));
	}
	
?>
