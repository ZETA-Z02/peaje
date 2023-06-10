<?php
require ("../model/consultas.model.php");
//instancia de consulta


if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['correo']) && !empty($_POST['direccion']) && !empty($_POST['genero'])){
    echo 'datos llegando';
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $genero = $_POST['genero'];  

    if(!insertarPersonal($nombre,$apellido,$dni,$telefono,$correo,$direccion,$genero)){
        echo 'algo salio mal';
        header("location: ../view/registrarPersonal.view.php");
    }
    $data = verPersonal($nombre,$apellido,$dni);

    header("location: ../view/registrarUsuario.view.php?idpersonal=".urlencode($data['id_personal']));
}else{
    echo 'error faltan datos por llenar';
    header("location: ../view/registrarPersonal.view.php");
}

?>