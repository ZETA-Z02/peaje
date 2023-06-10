<?php

require "../model/consultas.model.php";


if(!empty($_POST['usuario']) && !empty($_POST['contrasena']) && !empty($_POST['nivel']) && ($_POST['contrasena']== $_POST['contrasena1'])){
    //datos a variables 
    $usuario = $_POST['usuario'];
    //$contrasena = $_POST['contraseña'];
    //$contrasena1 = $_POST['contraseña1'];
    $nivel= $_POST['nivel'];
    $idpersonal = $_POST['idpersonal'];
    $validar = validarAdmin();
    
    if($validar['total'] == 0){
        $nivel = '1';
    }
    
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
    insertarUsuario($idpersonal,$usuario, $contrasena,$nivel);
    
    header("location: ../view/login.view.php");
}else{
    echo 'error';
    header("location: ../view/regitrarUsuario.view.php");
}

?>