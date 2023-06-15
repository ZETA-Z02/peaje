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
    
    if($data = verPersonal($nombre, $apellido, $dni)) {
        header("location: ../view/registrarUsuario.view.php?idpersonal=".urlencode($data['id_personal']));
    }else{
        // Insertar el nuevo registro
        $dniData = verificarDni($dni);
        if(!empty($dniData['dni'])){
            header("location: ../view/registrarPersonal.view.php?msg=dniExistente");
        }else{
            if(insertarPersonal($nombre, $apellido, $dni, $telefono, $correo, $direccion, $genero)){
                // Obtener los datos del nuevo registro insertado
                $data = verPersonal($nombre, $apellido, $dni);
                header("location: ../view/registrarUsuario.view.php?idpersonal=".urlencode($data['id_personal']));
            } else {
                echo 'algo salio mal';
                header("location: ../view/registrarPersonal.view.php");
            }
        }
    }

}else{
    echo 'error faltan datos por llenar';
    header("location: ../view/registrarPersonal.view.php");
}

?>