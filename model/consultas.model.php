<?php
require("conexion.php");

function validarAdmin(){
    $conexion = Conexion();
    $sql = "SELECT COUNT(*) as total FROM login;";
    $result = $conexion->query($sql);
    $data = $result->fetch_array(MYSQLI_ASSOC);
    return $data;
}
function validarAdmin1($user){
    $conexion = Conexion();
    $sql = "SELECT usuario, password FROM login WHERE usuario = '$user';";
    $result = $conexion->query($sql);
    $data = $result->fetch_array(MYSQLI_ASSOC);
    return $data;
}
function borrarSuperAdmin($usuario){
    $conexion = Conexion();
    $sql = "DELETE FROM login WHERE usuario = '$usuario';";
    $conexion->query($sql);
}
function insertarPersonal($nombre,$apellido,$dni,$telefono,$correo,$direccion,$genero){
    $conexion = Conexion();
    $sql = "INSERT INTO personal VALUES(null,'$nombre','$apellido',$dni,'$telefono','$correo','$direccion','$genero');";
    $conexion->query($sql);
}

function verPersonal($nombre,$apellido,$dni){   
    $conexion = Conexion();
    $sql = "SELECT * FROM personal WHERE nombre = '$nombre' AND apellido = '$apellido' AND dni = '$dni';";
    $result = $conexion->query($sql);
    $data = $result->fetch_array(MYSQLI_ASSOC);
    return $data;
}   
function insertarUsuario($idpersonal,$user,$password,$nivel){
    $conexion = Conexion();
    $sql = "INSERT INTO login VALUES(null,'$idpersonal','$user','$password','$nivel');";
    $conexion->query($sql);
}
function validarUser($user){
    $conexion = Conexion();
    $sql = "SELECT id_personal, usuario, password, nivel_usuario FROM login WHERE usuario = '$user';";
    $result = $conexion->query($sql);
    $data = $result->fetch_array(MYSQLI_ASSOC);
    return $data;
}

?>