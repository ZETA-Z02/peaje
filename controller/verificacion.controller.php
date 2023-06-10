<?php
require("../model/consultas.model.php");
$validar = validarAdmin();

if(isset($_POST['usuario']) && isset($_POST['password'])){
    $user = validarAdmin1($_POST['usuario']);
    if(password_verify($_POST['password'], $user['password'])){
        borrarSuperAdmin($user['usuario']);
        header("location: ../view/registrarPersonal.view.php");
    }else{
        header("location: ../view/login.admin.php");
    }
    //header("location: ../view/registrarPersonal.view.php");
}else{
    if($validar['total'] == 0){
        echo 'entra a pagina superadmin';
        $conexion = conexion();
        $superAdmin = '2023200302';
        $passwordAdmin = 'superDiana20032023';
        $passwordEncryp = password_hash($passwordAdmin,PASSWORD_BCRYPT);
        //encrptar la contrase;a del super administrador para guardar en la base de datos que servi

        //$sqlPersonal = "INSERT INTO personal VALUES(null,'$name',null,null,'$telefono','$email',null,null)";
        $sql = "INSERT INTO login VALUES(null,null,'$superAdmin','$passwordEncryp',null)";

        if(!$conexion->query($sql)){
            echo 'error en insertar valores a la tabla personal';
        }
        
        header("location:../view/login.admin.php");
    }else{
        header("location: ../view/login.view.php");
    }
}


?>