<?php

include('conexion.php');


function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

function userExist($user, $pass){

    global $mysqli;

    $md5pass = md5($pass);

    $query = "SELECT username, nombre, email, pass FROM user WHERE username='$user'";
    $resultado = $mysqli->query($query);
    $row = $resultado->fetch_assoc();
    //$veri = md5($row['pass']);

    if($user==$row['username'] && $md5pass==$row['pass']){
        return true;
    }
    else{
        return false;
    }
}

function userUpdate($nombre, $username, $pass, $email){

    global $mysqli;

    $query="UPDATE user SET nombre='$nombre', username='$username', pass='$pass', email='$email' WHERE id='1'";
    $resultado=$mysqli->query($query);
    
    if($resultado>0){ 
        return true;
    }else{
        return false;
    }

}

function bienvenida(){

    global $mysqli;

    $query = "SELECT username, nombre, email, pass FROM user WHERE id='1'";
    $resultado = $mysqli->query($query);
    $row = $resultado->fetch_assoc();

    if($row>0){
        return $row;
    }else{
        return $row;
    }

}

function mostrarPregunta($id){

    global $mysqli;

    $query = "SELECT id, pregunta FROM preguntas WHERE id=$id";
    $resultado = $mysqli->query($query);
    $row = $resultado->fetch_assoc();

    if($row>0){
        return $row;
    }else{
        return $row;
    }

}

function equipos(){

    global $mysqli;

    $queryy = "SELECT id, nombre, integrantes FROM team";
    $resultado = $mysqli->query($queryy);

    if($resultado->num_rows>0){
        return $resultado;
    }else{
        return $resultado;
    }
}

function img(){

    global $mysqli;

    $query = "SELECT id, nombre, ruta_img FROM certamen";
    $resultado = $mysqli->query($query);
    $row = $resultado->fetch_assoc();

    if($row>0){
        return $row;
    }else{
        return $row;
    }
}

function addequipo($user, $num){

    global $mysqli;
    $band = 1;

    $validar = "SELECT id FROM team WHERE nombre='$user'";
    $result = $mysqli->query($validar);

    if($result->num_rows > 0){
      return $band;
    }else{
        $query = "INSERT INTO team (nombre, integrantes) VALUES ('$user','$num')";
        $resultado = $mysqli->query($query);

        if ($resultado > 0) {
            return 2;
        } else {
            return false;
        }
    }
}

function addpregunta($info){

    global $mysqli;

    $validar = "SELECT id FROM preguntas WHERE pregunta='$info'";
    $result = $mysqli->query($validar);

    if($result->num_rows > 0){
      return 1;
    }else{
        $query = "INSERT INTO preguntas (pregunta) VALUES ('$info')";
        $resultado = $mysqli->query($query);

        if ($resultado > 0) {
            return 2;
        } else {
            return 0;
        }
    }
}

function addrespuesta($id, $inciso, $respuesta, $check){

    global $mysqli;

    $validar = "SELECT id, id_pregunta, inciso, respuesta FROM respuestas WHERE id_pregunta='$id'";
    $resultado = $mysqli->query($validar);
    $row = $resultado->fetch_assoc();

    if($row['respuesta']==$respuesta){
        return 2;
    }else if($row['inciso']==$inciso){
        return 3;
    }else{
        $query = "INSERT INTO respuestas (id_pregunta, inciso, respuesta, estado) VALUES ('$id','$inciso','$respuesta', '$check')";
        $resultado = $mysqli->query($query);

        if ($resultado > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}

function deleteteam($id){

    global $mysqli;

    $query="DELETE FROM team WHERE id='$id'";
    $resultado=$mysqli->query($query);

    if($resultado>0){
        return true;
    }else{
        return false;
    }
    
}

function question(){

    global $mysqli;

    $queryy = "SELECT id, pregunta FROM preguntas";
    $resultado = $mysqli->query($queryy);

    if($resultado->num_rows>0){
        return $resultado;
    }else{
        return $resultado;
    }
}

function respuestas($id){

    global $mysqli;

    $queryy = "SELECT id, inciso, respuesta, estado FROM respuestas WHERE id_pregunta =$id";
    $resultado = $mysqli->query($queryy);

    if($resultado->num_rows>0){
        return $resultado;
    }else{
        return $resultado;
    }
}

function subirImg($ruta, $nombre){

    global $mysqli;

    $id = 3;

    $query = "UPDATE certamen SET nombre='$nombre', ruta_img='$ruta' WHERE id='$id'";
    $resultado = $mysqli->query($query);

        if ($resultado > 0) {
            return true;
        } else {
            return false;
        }
}

function questionUpdate($id ,$question){

    global $mysqli;

    $validar = "SELECT id, pregunta FROM preguntas WHERE pregunta='$question'";
    $result = $mysqli->query($validar);

    if($result->num_rows >0){
        return 2;
    }else{
        $query = "UPDATE preguntas SET pregunta='$question' WHERE id='$id'";
        $resultado = $mysqli->query($query);

        if ($resultado->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    }

    function deleteQuestion($id){

        global $mysqli;
    
        $query="DELETE FROM preguntas WHERE id='$id'";
        $resultado=$mysqli->query($query);

        $query="DELETE FROM respuestas WHERE id_pregunta='$id'";
        $res=$mysqli->query($query);
    
        if($resultado>0 & $res>0){
            return true;
        }else{
            return false;
        }
        
    }

    function deleteAns($id){

        global $mysqli;
    
        $query="DELETE FROM respuestas WHERE id='$id'";
        $resultado=$mysqli->query($query);
    
        if($resultado>0){
            return true;
        }else{
            return false;
        }
        
    }

?>