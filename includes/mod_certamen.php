<?php
include 'function.php';

//Si se quiere subir una imagen
if (isset($_POST['subir'])) {
   //Recogemos el archivo enviado por el formulario
   $archivo = $_FILES['img']['name'];
   $name = $_POST['nombre'];
   //Si el archivo contiene algo y es diferente de vacio
   if (isset($archivo) && $archivo != "") {
      //Obtenemos algunos datos necesarios sobre el archivo
      $tipo = $_FILES['img']['type'];
      $tamano = $_FILES['img']['size'];
      $temp = $_FILES['img']['tmp_name'];
      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
     if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
        $mensaje="¡Error! La extensión o el tamaño de los archivos no es correcta - Se permiten archivos .gif, .jpg, .png. y de 2 Mb como máximo.";
        header("Location: ../vistas/confcertamen.php?mensaje=".urlencode($mensaje));
    
     }
     else {
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
        if (move_uploaded_file($temp, '../img/'.$archivo)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('../img/'.$archivo, 0777);
            $ruta = "../img/"."$archivo";
            if(subirImg($ruta, $name)==true){
                $mensaje="La imagen se ha subido correctamente.";
                header("Location: ../vistas/confcertamen.php?mensaje=".urlencode($mensaje));
            }else{
                $mensaje="!Error¡ No se pudo subir la imagen";
                header("Location: ../vistas/confcertamen.php?mensaje=".urlencode($mensaje));
            }
            //Mostramos la imagen subida
            //echo '<p><img src="../img/'.$archivo.'"></p>';
        }
        else {
            $mensaje="¡Error! Ocurrió algún error al subir el fichero. No pudo guardarse.";
            header("Location: ../vistas/confcertamen.php?mensaje=".urlencode($mensaje));
           //Si no se ha podido subir la imagen, mostramos un mensaje de error
        }
      }
   }
}
?>